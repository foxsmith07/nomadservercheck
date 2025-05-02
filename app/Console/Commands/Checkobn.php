<?php

namespace App\Console\Commands;

use App\Models\Obn;
use Spatie\Ssh\Ssh;
use App\Models\Train;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

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
        $trains = Train::all();
        $this->info("Totale treni trovati: {$trains->count()}");

        foreach ($trains as $train) {
            $trainNumber = $train->number;
            $host = "10.226.{$trainNumber}.1";

            foreach (['switch', 'ap'] as $type) {
                $cmd = $type === 'switch'
                    ? 'show backbone switch overview'
                    : 'show backbone access point overview';

                $this->info("Connettendo al treno {$trainNumber} ({$type})...");

                try {
                    $result = Ssh::create('developer', $host)
                        // ->usePrivateKey()
                        ->disableStrictHostKeyChecking()
                        ->execute($cmd);

                    $output = $result->getOutput();
                    $this->parseAndStore($train->id, $type, $output);
                } catch (\Exception $e) {
                    Log::error("Errore con treno $trainNumber - $type: " . $e->getMessage());
                    $this->error("Errore su $host ($type): " . $e->getMessage());
                }
            }
        }

        $this->info('Monitoraggio OBN completato: ' . now());
    }
}
