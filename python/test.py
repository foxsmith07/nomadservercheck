import re

# Il tuo testo di input (può provenire da un file, un comando, ecc.)
data = """
| COACH | DEVICE | IP              | FIRMWARE                  | CONFIG                        |
| 1     | 1      | 10.226.32.233 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a049218-v10-AP ✓ |
| 1     | 2      | 10.226.32.242 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a04921e-v10-AP ✓ |
| 2     | 1      | 10.226.32.234 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a04922a-v10-AP ✓ |
| 2     | 2      | 10.226.32.241 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a04926a-v10-AP ✓ |
"""

# Definisci il pattern regex
# Usiamo una raw string (r"...") per evitare problemi con i backslash
# pattern = r"^\|\s*(\d+)\s*\|\s*(\d+)\s*\|\s*([\d\.]+)\s*[✓✗]?\s*\|\s*(.*?)\s*\s*\|\s*(.*?)\s*\s*\|$"
pattern = r"^\|\s*(\d+)\s*\|\s*(\d+)\s*\|\s*([\d\.]+\s*[✓✗]?)\s*\|\s*(.*?\s*[✓✗]?)\s*\|\s*(.*?\s*[✓✗]?)\s*\|$"


# Compiliamo il pattern per efficienza (opzionale ma buona pratica)
regex = re.compile(pattern)

# Lista per conservare i risultati estratti
extracted_data = []

# Iteriamo su ogni riga del testo
# splitlines() divide il testo in righe
for line in data.strip().splitlines():
    # Ignoriamo la riga dell'intestazione (possiamo farlo in vari modi)
    if "COACH" in line and "DEVICE" in line:
        continue # Salta alla prossima iterazione del ciclo

    # Applichiamo la regex alla riga corrente
    match = regex.search(line)

    # Se c'è una corrispondenza (match non è None)
    if match:
        # Estraiamo i gruppi catturati
        # match.groups() restituisce una tupla con tutti i gruppi catturati
        coach = match.group(1)
        device = match.group(2)
        ip_address = match.group(3)
        firmware = match.group(4).strip() # Usiamo strip() per rimuovere spazi bianchi iniziali/finali
        config = match.group(5).strip()   # che potrebbero essere catturati da .*?

        # Aggiungiamo i dati estratti alla nostra lista (come dizionario per chiarezza)
        extracted_data.append({
            # "COACH": coach,
            # "DEVICE": device,
            "Type": "AP",
            "Device": coach+"."+device,
            "IP": ip_address,
            "FIRMWARE": firmware,
            "CONFIG": config
        })

# Stampiamo i risultati
for record in extracted_data:
    print(record)
    # print(record["IP"])