import os
import sys
import subprocess as sp
import mysql.connector # Importa il connettore MySQL
import pprint # Utile per stampare i dati estratti per debug
from datetime import datetime

os.system('clear')


# --- INIZIO: Configurazione Database ---
DB_CONFIG = {
    'host': 'localhost',
    'user': 'root',
    'password': 'root',
    'database': 'nomadservercheck'
}
# --- FINE: Configurazione Database ---

def main():
    Trains=['32','37','38']

    for train in Trains:
        print('\nTrain '+train+'\n')

        ping=os.system("ping 10.226."+str(train)+".1 -c 3 >> /dev/null")
        if ping == 0:
            print("checking user... \n")
            record=sp.getoutput("ssh -o 'StrictHostKeyChecking no' developer@10.226."+str(train)+".1 'sudo /usr/local/bin/count_client.sh 1 '")
            print('user: '+record+'\n')
            insert_records_to_db(record,train)
        else:
            print("\nTrain unreachable")
    



def insert_records_to_db(record, train):

    connection = None
    try:
        connection = mysql.connector.connect(**DB_CONFIG)

        if connection.is_connected():
            cursor = connection.cursor()

            # 1. Elimina i vecchi record per questo treno (per evitare duplicati)
            delete_query = "DELETE FROM boxusers WHERE train = %s"
            cursor.execute(delete_query, (train,))
            print(f"Info [Treno {train}]: Record precedenti eliminati ({cursor.rowcount} righe).")

            # 2. Inserisci i nuovi record
            #    Assicurati che i nomi delle colonne (train, type, ...) e i placeholder (%(train)s, ...)
            #    corrispondano ESATTAMENTE alla tua tabella e alle chiavi del dizionario 'record'.
            insert_query = """
            INSERT INTO boxusers (train, usernum)
            VALUES (%(train)s, %(usernum)s)
            """
            # VALUES (..., %(ip)s, %(fw)s, %(conf)s)

            try:
                usernum = int(record) # Converti la stringa in un intero
                data = {'train': train, 'usernum': usernum}
                cursor.execute(insert_query, data)
                connection.commit()
                print(f"Successo [Treno {train}]: Inserito 1 nuovo record nel database.")
            except ValueError:
                print(f"Errore [Treno {train}]: Impossibile convertire '{record}' in un intero.")
                connection.rollback()
            except Exception as e:
                print(f"Errore [Treno {train}]: Errore durante l'inserimento: {e}")
                connection.rollback()

    except mysql.connector.Error as error:
        print(f"Errore DB [Treno {train}]: Impossibile eseguire l'operazione sul database.")
        print(f"  Dettagli errore: {error}")
        # In caso di errore durante l'inserimento, annulla le modifiche (se ce ne sono state)
        if connection and connection.is_connected():
            connection.rollback()
            print(f"Info [Treno {train}]: Rollback eseguito.")

    finally:
        # Assicurati di chiudere sempre cursore e connessione
        if connection and connection.is_connected():
            if 'cursor' in locals() and cursor:
                cursor.close()
            connection.close()
            # print(f"Info [Treno {train_number}]: Connessione MySQL chiusa.")

main()
