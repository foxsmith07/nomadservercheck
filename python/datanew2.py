import os
import sys
import subprocess as sp
import mysql.connector # Importa il connettore MySQL
import pprint # Utile per stampare i dati estratti per debug
from datetime import datetime

# --- INIZIO: Funzione di Parsing (dall'esempio precedente) ---
# Assicurati che questa funzione sia definita prima di essere chiamata
def parse_device_output_updated(output_text, train_number):
  """
  Parsa l'output testuale dei dispositivi di rete mantenendo i simboli ✓/✗
  e usando le abbreviazioni per il tipo. Restituisce una lista di record
  pronti per il database.
  """
  records = []
  current_type = None # Sarà 'SW' o 'AP'
  lines = output_text.strip().splitlines()

  now = datetime.now()
  updated_at = now.strftime("%Y-%m-%d %H:%M:%S")

  for line in lines:
    line = line.strip() # Pulisce spazi bianchi esterni della riga

    if "Backbone switch overview" in line:
      current_type = "SW"
      continue
    elif "Backbone access point overview" in line:
      current_type = "AP"
      continue

    if not line or line.startswith('+---') or "| COACH | DEVICE |" in line:
      continue

    if line.startswith('|') and line.endswith('|') and current_type:
      parts = [part.strip() for part in line.split('|')[1:-1]]

      if len(parts) == 5:
        try:
          coach = int(parts[0])
          device_num = int(parts[1])
          ip = parts[2]
          fw = parts[3] # Nome colonna DB: 'firmware'
          conf = parts[4]  # Nome colonna DB: 'configuration'

          record = {
              "train": train_number,
              "type": current_type,
              "coach": coach,
              "num": device_num,
              "ip": ip,
              "fw": fw, # Se la colonna è 'fw', cambia questa chiave in "fw"
              "conf": conf, # Se la colonna è 'conf', cambia questa chiave in "conf"
              "updated_at": updated_at,
          }
          records.append(record)
        except ValueError:
          print(f"Attenzione [Treno {train_number}]: Riga saltata perché non interpretabile come dato: {line}")
        except IndexError:
          print(f"Attenzione [Treno {train_number}]: Riga saltata per indice fuori range (malformattata?): {line}")

  return records
# --- FINE: Funzione di Parsing ---


# --- INIZIO: Configurazione Database ---
# !!! SOSTITUISCI CON I TUOI VALORI REALI !!!
DB_CONFIG = {
    'host': 'localhost',       # o l'IP del tuo server DB
    'user': 'root',
    'password': 'root',
    'database': 'nomadservercheck' # Il nome del database che contiene la tabella 'obns'
}
# !!! GESTISCI QUESTE CREDENZIALI IN MODO SICURO IN PRODUZIONE (es. variabili d'ambiente) !!!
# --- FINE: Configurazione Database ---


def insert_records_to_db(records, train_number):
    """
    Inserisce una lista di record nel database per un dato treno.
    Prima elimina i record esistenti per quel treno.
    """
    if not records:
        print(f"Info [Treno {train_number}]: Nessun record valido da inserire.")
        return

    connection = None # Inizializza a None per il blocco finally
    try:
        connection = mysql.connector.connect(**DB_CONFIG)

        if connection.is_connected():
            cursor = connection.cursor()

            # 1. Elimina i vecchi record per questo treno (per evitare duplicati)
            delete_query = "DELETE FROM obns WHERE train = %s"
            cursor.execute(delete_query, (train_number,))
            print(f"Info [Treno {train_number}]: Record precedenti eliminati ({cursor.rowcount} righe).")

            # 2. Inserisci i nuovi record
            #    Assicurati che i nomi delle colonne (train, type, ...) e i placeholder (%(train)s, ...)
            #    corrispondano ESATTAMENTE alla tua tabella e alle chiavi del dizionario 'record'.
            insert_query = """
            INSERT INTO obns (train, type, coach, num, ip, fw, conf, updated_at)
            VALUES (%(train)s, %(type)s, %(coach)s, %(num)s, %(ip)s, %(fw)s, %(conf)s, %(updated_at)s)
            """
            # IMPORTANTE: Se le tue colonne sono 'fw'/'conf', modifica l'INSERT qui sopra:
            # VALUES (..., %(ip)s, %(fw)s, %(conf)s)

            cursor.executemany(insert_query, records)
            connection.commit() # Conferma le modifiche
            print(f"Successo [Treno {train_number}]: Inseriti {cursor.rowcount} nuovi record nel database.")

    except mysql.connector.Error as error:
        print(f"Errore DB [Treno {train_number}]: Impossibile eseguire l'operazione sul database.")
        print(f"  Dettagli errore: {error}")
        # In caso di errore durante l'inserimento, annulla le modifiche (se ce ne sono state)
        if connection and connection.is_connected():
            connection.rollback()
            print(f"Info [Treno {train_number}]: Rollback eseguito.")

    finally:
        # Assicurati di chiudere sempre cursore e connessione
        if connection and connection.is_connected():
            if 'cursor' in locals() and cursor:
                cursor.close()
            connection.close()
            # print(f"Info [Treno {train_number}]: Connessione MySQL chiusa.")


def validate():
    os.system('clear')
    Trains = ['32', '37', '38'] # Assicurati che questi siano stringhe se usati come tali

    for train in Trains:
        print(f"--- Processing Train: {train} ---")
        # Usa f-string per leggibilità
        ping_command = f'ping {DB_CONFIG["host"]} -c 3' # Ping al DB host o a un IP del treno? Modifico per pingare l'IP del treno come nel tuo script originale
        target_ip = f'10.226.{train}.1'
        ping_command = f'ping {target_ip} -c 3'

        now = datetime.now()
        updated_at = now.strftime("%Y-%m-%d %H:%M:%S")

        print(updated_at)
        # Esegui il ping silenziosamente
        ping_process = sp.run(ping_command.split(), capture_output=True)
        # ping = os.system(f'{ping_command} >> /dev/null 2>&1') # Alternativa con os.system

        if ping_process.returncode == 0: # Verifica il return code del processo
            print(f"Info [Treno {train}]: Raggiungibile ({target_ip}). Eseguo comando obn validate...")
            ssh_command = f"ssh -o StrictHostKeyChecking=no -o ConnectTimeout=10 developer@{target_ip} sudo obn validate" # Aggiunto timeout
            try:
                # Usa sp.run per maggiore controllo e cattura errori
                ssh_process = sp.run(ssh_command.split(), capture_output=True, text=True, check=True, timeout=60) # Timeout per ssh
                output = ssh_process.stdout
                print(f"Info [Treno {train}]: Output ricevuto:\n{output[:500]}...\n") # Stampa solo inizio output per brevità

                # --- Integrazione Parsing e DB ---
                # 1. Parsa l'output
                parsed_records = parse_device_output_updated(output, train)

                # Stampa i record parsati (opzionale, per debug)
                # print(f"Debug [Treno {train}]: Record parsati:")
                # pprint.pprint(parsed_records)

                # 2. Inserisci nel DB
                insert_records_to_db(parsed_records, train)
                # --- Fine Integrazione ---

            except sp.CalledProcessError as e:
                print(f"Errore SSH [Treno {train}]: Il comando remoto ha fallito (exit code {e.returncode}).")
                print(f"  Stderr: {e.stderr}")
                print(f"  Stdout: {e.stdout}")
            except sp.TimeoutExpired:
                print(f"Errore SSH [Treno {train}]: Timeout durante l'esecuzione del comando.")
            except Exception as e:
                print(f"Errore Sconosciuto [Treno {train}]: Durante SSH o parsing: {e}")

        else:
            print(f"Errore [Treno {train}]: Non raggiungibile ({target_ip}).")
        print(f"--- Fine Processing Train: {train} ---\n")

# Esegui la funzione principale
validate()