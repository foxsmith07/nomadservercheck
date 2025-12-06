# Technology

- Laravel 12
    - fortify
    - livewire 3.6.1

- Tailwind css 4
    - DaisyUi 5

- Alpine Js


## STACK LEMP

## libreria Wysiwyg

TinyMCE 7.0.1 scaricata nell'eventualità non funzioni la cdn.. (ma rimane il tasto upgrade!!)
- messo a commento assett nonostante la cartella è presente in public
- al momento lo script prende la cdn

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


# data pagina engineering

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






