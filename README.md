# Technology

- Laravel 12
    - fortify
    - livewire 3.6.1

- Tailwind css 4
    - DaisyUi 5

- Alpine Js


## STACK LEMP


## Data ...

- Train
- uptime (da quanto tempo è acceso)
- Situazione modem
    Modem (ce0p0..)
    status (active..)
    tech (LTE..)
    provider (Voda it)
    ICCID
    slot (7)
- ?? nomad connect version
- ?? GPS
- AP
    - coach
    - IP
    - Firmware
    - Configuration
- Switch
    - coach
    - IP
    - Firmware
    - Configuration
- Docker
    - container attivi con versioni


# datta pagina engineering

*On Board Network*
Nome - Coach 7 ap 1
type - AP , SW ecc
Coach - 7
IP - 10.226.105.230
Firmware - 6.11.4-beta3
Configuration - IBX1510-00145a048fde-v10-AP

*Modem Overview*
Modem - ce0p0
Status - Connected (verde) , missing rosso ecc
Tech - LTV
Provider - VodaIT
ICCID - 8939105656568584
Slot - 7
?? APN - mobile.vodafone.it 
?? Lock - true verde
?? Last active - 4 apr 2025 09:48

*GPS*
Latitude
Longitude
Speed



**output validate**
*sudo obn validate*

+---------------------------------------------------------------------------------------------------------+
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
+-------+--------+-----------------+---------------------------+-------------------------------+



**MARCLI**
*marcli all*

MAR INFORMATION:
****************

   ce0p0: st:       DOWN bs:19821651680 br:140024487167 al:   -1 at:  0.000 Mbit/s au:  0.000 Mbit/s ap:    0% ns:    0  tps:    0   ha: IPv4
   ce1p0: st:     ACTIVE bs:35823763359 br:215359629489 al:   76 at:  11.127 Mbit/s au:  1.314 Mbit/s ap:    0% ns:    0  tps:    0   ha: IPv4
   ce2p0: st:     ACTIVE bs:18106538257 br:96003621897 al:  137 at:  0.013 Mbit/s au:  0.389 Mbit/s ap:    0% ns:    0  tps:    0   ha: IPv4
    lan2: st:       DOWN bs:          0 br:          0 al:   -1 at:  0.000 Mbit/s au:  0.000 Mbit/s ap:    0% ns:    0  tps:    0   ha: IPv4

total: bs:73751953296 br:451387738553 at:  11.139 Mbit au:  1.703 Mbit/s

HA (IPv4): 89.207.175.34
HA (IPv6): None


MODEM INFORMATION:
****************

         state                 powered      geo-disabled     sim        operator     cell          lac         network        band             iccid
         -----                 -------      ------------     ---        --------     ----          ---         -------        ----             -----
ce0p0:   UNKNOWN               FALSE        FALSE            9          0            0             0                                                                  
ce1p0:   CONNECTED             TRUE         FALSE            11         22201        179338273     17105       5GNR           B28              89390100002654944325   
ce2p0:   CONNECTED             TRUE         FALSE            12         22288        62613254      24414       LTE            B20              8939880825110191786    


GEO INFORMATION:
****************

GPS updates enabled:                            TRUE
Last update:            Tue Apr 15 08:46:17 UTC 2025

Valid:                                          TRUE
Latitude:                                   45.42567
Longitude:                                  10.96912
Altitude:                                   73.15500
Heading:                                       79.91
Speed:                                       61 km/h




*per la data/ora giusta*
in config/app.php ho modificato 

questo 'timezone' => 'UTC' 

in questo 'timezone' => 'Europe/Rome',, nel nel file env

## Cron da inserire

1. Mandare mail ogni 1 del mese alle 7.00

    00 07 */1 * * cd /var/www/nomadservercheck/ && /usr/bin/php artisan cov:report >> /var/www/nomadservercheck/storage/cov_report.log

2. Start del server alle 7.00 ogni giorno

    0 7 * * * cd /var/www/nomadservercheck && nohup composer run dev > storage/logs/server.log 2>&1 &

3. Stop del server alle 23.00 di ogni sera

    0 23 * * * pkill -f "composer run dev" && echo "Server stoppato! $(date)" >> storage/logs/server.lo