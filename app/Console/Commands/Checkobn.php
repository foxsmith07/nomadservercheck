<?php

namespace App\Console\Commands;

use App\Models\Obn;
use Spatie\Ssh\Ssh;
use App\Models\Train;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Stmt\TryCatch;

class Checkobn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:obn';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Controlla tutti i treni OBN stile output validate';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Inizio check OBN');

        // 1. Recupera tutti i treni
        $trains = Train::where('tipology', 'iob')->get();
        $this->info("Totale treni trovati: {$trains->count()}\n\n");

        // regex “grezza” per catturare ogni riga dati
        $pattern = '/^\|\s*(\d+)\s*\|\s*(\d+)\s*\|\s*'      // coach, device
            . '([\d\.]+(?:\s*[✓✗])?)\s*\|\s*'           // ip + ✓/✗
            . '(.+?[✓✗])\s*\|\s*'                      // firmware + simbolo
            . '(.+?[✓✗])\s*\|/m';                     // config + simbolo

        foreach ($trains as $train) {
            $trainNumber = $train->number;
            $this->info("\nTrain: {$trainNumber}__________________\n");
            $host = "10.226.{$trainNumber}.1";

            exec("ping -c 3 -w 3 {$host}", $output, $ping);

            if ($ping == 0) {
                Obn::where('train_id', $train->id)->delete();

                $validate = Ssh::create('developer', $host)->disableStrictHostKeyChecking()->execute('sudo obn validate')->getOutput();
                // $this->info('Validate: ' . $validate);

                // 1) Splitta in righe
                $lines = explode("\n", str_replace("\r\n", "\n", $validate));

                // 2) Elimina tutte le righe “bordo” tipo +-------+--------+...+
                $lines = array_values(array_filter($lines, function ($line) {
                    return !preg_match('/^\+[-+]+$/', trim($line));
                }));

                //! SWITCH
                // 3) Trova l’indice del titolo “Backbone switch overview”
                $switchTitleIdx = null;
                foreach ($lines as $i => $line) {
                    if (strpos($line, 'Backbone switch overview') !== false) {
                        $switchTitleIdx = $i;
                        break;
                    }
                }
                if ($switchTitleIdx === null) {
                    $this->error('Switch overview non trovato');
                    return;
                }

                // 4) Trova l’indice dell’header della tabella
                $headerIdx = null;
                for ($i = $switchTitleIdx + 1; $i < count($lines); $i++) {
                    if (strpos($lines[$i], '| COACH | DEVICE |') === 0) {
                        $headerIdx = $i;
                        break;
                    }
                }
                if ($headerIdx === null) {
                    $this->error('Header tabella switch non trovato');
                    return;
                }

                // 5) A partire dalla riga dopo l’header, raccogli **tutte** le righe dati
                $switchRows = [];
                for ($j = $headerIdx + 1; $j < count($lines); $j++) {
                    $line = trim($lines[$j]);
                    // se la riga non inizia più con "|" → fine tabella
                    if (!str_starts_with($line, '|')) {
                        break;
                    }

                    // split semplice: tolgo i bordi e divido
                    $cols = array_map('trim', explode('|', trim($line, "| \t")));
                    // esattamente 5 colonne e coach numerico
                    if (count($cols) === 5 && is_numeric($cols[0])) {
                        list($coach, $device, $ip, $firmware, $config) = $cols;
                        $switchRows[] = compact('coach', 'device', 'ip', 'firmware', 'config');
                    } else {
                        // se incontra una riga non dati (es. header di AP), esce
                        break;
                    }
                }

                // DEBUG: mostro quanti switch ho trovato e le loro righe
                $this->warn("Switch trovati: " . count($switchRows));
                foreach ($switchRows as $row) {
                    $this->info("coach={$row['coach']} device={$row['device']} ip={$row['ip']} firmware={$row['firmware']} config={$row['config']}");
                }

                // 6) Salva nel database
                foreach ($switchRows as $row) {
                    Obn::updateOrCreate(
                        [
                            'train_id' => $train->id,
                            'type'     => 'SW',
                            'coach'    => (int)$row['coach'],
                            'device'   => (int)$row['device'],
                        ],
                        [
                            'ip'        => $row['ip'],
                            'firmware'  => $row['firmware'],
                            'config'    => $row['config'],
                            'lastcheck' => now(),
                        ]
                    );
                }


                //! ACCESS POINT
                // 3) Trova l’indice del titolo “Backbone switch overview”
                $apTitleIdx = null;
                foreach ($lines as $i => $line) {
                    if (strpos($line, 'Backbone access point overview') !== false) {
                        $apTitleIdx = $i;
                        break;
                    }
                }
                if ($apTitleIdx === null) {
                    $this->error('Access point overview non trovato');
                    return;
                }

                // 4) Trova l’indice dell’header della tabella
                $headerIdx = null;
                for ($i = $apTitleIdx + 1; $i < count($lines); $i++) {
                    if (strpos($lines[$i], '| COACH | DEVICE |') === 0) {
                        $headerIdx = $i;
                        break;
                    }
                }
                if ($headerIdx === null) {
                    $this->error('Header tabella access point non trovato');
                    return;
                }

                // 5) A partire dalla riga dopo l’header, raccogli **tutte** le righe dati
                $apRows = [];
                for ($j = $headerIdx + 1; $j < count($lines); $j++) {
                    $line = trim($lines[$j]);
                    // se la riga non inizia più con "|" → fine tabella
                    if (!str_starts_with($line, '|')) {
                        break;
                    }

                    // split semplice: tolgo i bordi e divido
                    $cols = array_map('trim', explode('|', trim($line, "| \t")));
                    // esattamente 5 colonne e coach numerico
                    if (count($cols) === 5 && is_numeric($cols[0])) {
                        list($coach, $device, $ip, $firmware, $config) = $cols;
                        $apRows[] = compact('coach', 'device', 'ip', 'firmware', 'config');
                    } else {
                        // se incontra una riga non dati (es. header di AP), esce
                        break;
                    }
                }

                // DEBUG: mostro quanti switch ho trovato e le loro righe
                $this->warn("\nAccess Point trovati: " . count($apRows));
                foreach ($apRows as $row) {
                    $this->info("coach={$row['coach']} device={$row['device']} ip={$row['ip']} firmware={$row['firmware']} config={$row['config']}");
                }

                // 6) Salva nel database
                foreach ($apRows as $row) {
                    Obn::updateOrCreate(
                        [
                            'train_id' => $train->id,
                            'type'     => 'AP',
                            'coach'    => (int)$row['coach'],
                            'device'   => (int)$row['device'],
                        ],
                        [
                            'ip'        => $row['ip'],
                            'firmware'  => $row['firmware'],
                            'config'    => $row['config'],
                            'lastcheck' => now(),
                        ]
                    );
                }
            } else {
                $this->error("Train {$trainNumber} unreachable");
            }
        }

        $this->info("\nMonitoraggio OBN completato: " . now() . "\n\n");
    }
}
