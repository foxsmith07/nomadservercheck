import mysql.connector
import subprocess
import time
from datetime import datetime

# Configura la connessione al database Laravel
db_config = {
    "host": "localhost",
    "user": "root",        # Cambia con il tuo utente MySQL
    "password": "root", # Cambia con la tua password MySQL
    "database": "iobcheck" # Cambia con il nome del database Laravel
}

def get_obn_output():
    """Esegue il comando remoto per ottenere l'output del server"""
    try:
        train = '38'
        # result = subprocess.run(["ssh -o StrictHostKeyChecking=no developer@10.226."+train+".1 sudo obn validate"], capture_output=True, text=True)
        result = subprocess.run(
            ["ssh", "-o", "StrictHostKeyChecking=no", f"developer@10.226.{train}.1", "sudo", "obn", "validate"],
            capture_output=True,
            text=True
        )
        return result.stdout.strip()  # Rimuove eventuali spazi extra
    except Exception as e:
        print(f"Errore durante l'esecuzione del comando: {e}")
        return None

def update_train_records():
    """Aggiorna ogni treno nella tabella con l'output ricevuto"""
    try:
        conn = mysql.connector.connect(**db_config)
        cursor = conn.cursor()

        # Ottieni tutti i treni dalla tabella
        cursor.execute("SELECT id, name, number FROM trains")
        trains = cursor.fetchall()

        for train_id, name, number in trains:
            obn_output = get_obn_output()
            if obn_output:
                query = """
                    UPDATE trains 
                    SET obn = %s, updated_at = NOW()
                    WHERE id = %s
                """
                cursor.execute(query, (obn_output, train_id))
                conn.commit()
                print(f"Aggiornato treno ID {train_id}: {name} ({number})")

        cursor.close()
        conn.close()
    except mysql.connector.Error as err:
        print(f"Errore MySQL: {err}")

def main():
    """Esegue lo script dalle 07:00 alle 23:00 ogni 10 minuti"""
    while True:
        now = datetime.now()
        current_hour = now.hour

        if 7 <= current_hour < 23:
            print(f"{now}: Aggiornamento in corso...")
            update_train_records()
        else:
            print(f"{now}: Fuori dall'orario di attività. In attesa...")

        time.sleep(600)  # Aspetta 10 minuti

if __name__ == "__main__":
    main()


# 🔹 3. Cosa fa questo script?
# ✅ Si collega al database Laravel
# ✅ Recupera tutti i record della tabella trains
# ✅ Ogni 10 minuti aggiorna l'obn e updated_at
# ✅ Funziona solo tra le 07:00 e le 23:00
# ✅ Gestisce errori del database o del comando shell

# 🔹 4. Come avviare il processo in background?
# Se vuoi eseguire lo script in background su un server Linux:

# Esegui il comando

# bash
# Copia
# Modifica
# nohup python3 update_trains.py > update_log.txt 2>&1 &
# 🔹 Questo lo avvia in background e salva i log in update_log.txt.

# Verifica che sia attivo

# bash
# Copia
# Modifica
# ps aux | grep update_trains.py
# Se vuoi fermarlo

# bash
# Copia
# Modifica
# pkill -f update_trains.py
# 🔹 5. Configurazione per l'avvio automatico
# Se vuoi che lo script si avvii automaticamente all'accensione del server, aggiungilo al crontab:

# bash
# Copia
# Modifica
# crontab -e
# Aggiungi questa riga:

# bash
# Copia
# Modifica
# @reboot nohup python3 /path/to/update_trains.py > /path/to/update_log.txt 2>&1 &
# Ora si avvierà automaticamente ogni volta che il server si riavvia! 🚀