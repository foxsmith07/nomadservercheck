import re
import mysql.connector

# Connessione al database MySQL
conn = mysql.connector.connect(
    host="localhost",
    port=3306,
    user="root",
    password="root",
    database="nomadservercheck"
)
cursor = conn.cursor()

# Inserisci qui l'output completo come stringa
text = """+---------------------------------------------------------------------------------------------------------+
|                                         Backbone switch overview                                        |
+-------+--------+-----------------+----------------------------------+-----------------------------------+
| COACH | DEVICE | IP              | FIRMWARE                         | CONFIG                            |
+-------+--------+-----------------+----------------------------------+-----------------------------------+
| 1     | 1      | 10.226.32.201 ✓ | V5.5.6 build 25031918 (V5.5.4) ✗ | TNG4516POE-0090e8c891fa-SLV-V2 ✓  |
| 2     | 1      | 10.226.32.203 ✓ | V5.5.6 build 25031918 (V5.5.4) ✗ | TNG4516POE-0090e8c8921a-SLV-V2 ✓  |
| 3     | 1      | 10.226.32.207 ✓ | V5.5.6 build 25031918 (V5.5.4) ✗ | TNG4516POE-0090e8c89206-SLV-V2 ✓  |
| 4     | 1      | 10.226.32.206 ✓ | V5.5.6 build 25031918 (V5.5.4) ✗ | TNG4516POE-0090e8c89212-SLV-V2 ✓  |
| 5     | 1      | 10.226.32.200 ✓ | V5.5.6 build 25031918 (V5.5.4) ✗ | TNG4516POE-0090e8c8921e-SLV-V2 ✓  |
| 6     | 1      | 10.226.32.204 ✓ | V5.5.6 build 25031918 (V5.5.4) ✗ | TNG4516POE-0090e8c891fc-MSTR-V2 ✓ |
| 7     | 1      | 10.226.32.205 ✓ | V5.5.6 build 25031918 (V5.5.4) ✗ | TNG4516POE-0090e8c89218-SLV-V2 ✓  |
+-------+--------+-----------------+----------------------------------+-----------------------------------+


+----------------------------------------------------------------------------------------------+
|                                Backbone access point overview                                |
+-------+--------+-----------------+---------------------------+-------------------------------+
| COACH | DEVICE | IP              | FIRMWARE                  | CONFIG                        |
+-------+--------+-----------------+---------------------------+-------------------------------+
| 1     | 1      | 10.226.32.233 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a049218-v10-AP ✓ |
| 1     | 2      | 10.226.32.242 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a04921e-v10-AP ✓ |
| 2     | 1      | 10.226.32.234 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a04922a-v10-AP ✓ |
| 2     | 2      | 10.226.32.241 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a04926a-v10-AP ✓ |
| 3     | 1      | 10.226.32.232 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a048fee-v10-AP ✓ |
| 3     | 2      | 10.226.32.238 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a049244-v10-AP ✓ |
| 4     | 1      | 10.226.32.235 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a048fc6-v10-AP ✓ |
| 4     | 2      | 10.226.32.239 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a048fce-v10-AP ✓ |
| 5     | 1      | 10.226.32.231 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a048172-v10-AP ✓ |
| 5     | 2      | 10.226.32.230 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a04927e-v10-AP ✓ |
| 6     | 1      | 10.226.32.240 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a04927a-v10-AP ✓ |
| 6     | 2      | 10.226.32.243 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a0488a0-v10-AP ✓ |
| 7     | 1      | 10.226.32.236 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a049210-v10-AP ✓ |
| 7     | 2      | 10.226.32.237 ✓ | 6.11.4-beta3 (6.11.4-0) ✗ | IBX1510-00145a049222-v10-AP ✓ |
+-------+--------+-----------------+---------------------------+-------------------------------+"""

# Funzione per estrarre dati da una sezione e costruire i record
def extract_section_data(section_text, device_type):
    records = []
    lines = section_text.strip().split("\n")
    for line in lines:
        # Modifica dell'espressione regolare per gestire i vari formati
        match = re.match(r"\|\s*(\d+)\s*\|\s*(\d+)\s*\|\s*([\d.]+)\s*[\✓✗]?\s*\|\s*(.*?)\s*[\✓✗]?\s*\|\s*(.*?)\s*[\✓✗]?\s*\|", line)
        if match:
            coach = int(match.group(1))
            num = int(match.group(2))
            ip = match.group(3)
            fw = match.group(4).strip()
            conf = match.group(5).strip()
            records.append((device_type, coach, num, ip, fw, conf))
    return records

# Troviamo le sezioni "switch" e "access point"
switch_block = re.search(r"Backbone switch overview.*?\+[-+]+\+\n(.*?)\+[-+]+\+", text, re.DOTALL)
ap_block = re.search(r"Backbone access point overview.*?\+[-+]+\+\n(.*?)\+[-+]+\+", text, re.DOTALL)

# Debug: Stampa le sezioni estratte
if switch_block:
    print("Sezione switch trovata")
    print(switch_block.group(1))
else:
    print("Sezione switch non trovata")

if ap_block:
    print("Sezione access point trovata")
    print(ap_block.group(1))
else:
    print("Sezione access point non trovata")

# Creiamo una lista per contenere tutti i record
all_records = []

if switch_block:
    all_records += extract_section_data(switch_block.group(1), "switch")
if ap_block:
    all_records += extract_section_data(ap_block.group(1), "access_point")

# Debug: Mostra quanti record sono stati estratti
print(f"Record estratti: {len(all_records)}")

# Inseriamo i record nella tabella 'testpies'
for record in all_records:
    cursor.execute("""
        INSERT INTO testpies (type, coach, num, ip, fw, conf)
        VALUES (%s, %s, %s, %s, %s, %s)
    """, record)

# Salvataggio e chius
