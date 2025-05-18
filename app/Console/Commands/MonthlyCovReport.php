<?php

namespace App\Console\Commands;

use App\Mail\ReportCovCallsMail;
use App\Models\Covreport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MonthlyCovReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cov:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send mail \'cov report mail\' with previous month counter';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $inizioMeseCorrente = now()->startOfMonth();


        $this->info('inizio mese corrente: ' . $inizioMeseCorrente);

        $inizioMeseScorso= now()->subMonthNoOverflow()->startOfMonth();
        $this->info('Inizio mese scorso: '.$inizioMeseScorso);

        $fineMeseScorso= now()->subMonthNoOverflow()->endOfMonth();
        $this->info('Fine mese scorso: '.$fineMeseScorso);

        $mail = 'fortunato.di.domenico@nomadrail.com';
        // $countCov = Covreport::all()->count();
        $countCov = Covreport::whereBetween('created_at', [$inizioMeseScorso, $fineMeseScorso])->count();


        $nomeMesePrecedente = ucfirst(now()->subMonthNoOverflow()->locale('it')->monthName);

        $this->warn('chiamate COV mese di '. $nomeMesePrecedente . ' : '. $countCov);
        $this->warn('da mandare a: ' . $mail);

        $data = compact('mail', 'countCov','nomeMesePrecedente');

        try {
            Mail::to($mail)->cc('fortunato.didomenico@gmail.com')->send(new ReportCovCallsMail($data));

            $preciso = now();

            $this->info('mail inviata: ' . $preciso);
        } catch (\Exception $e) {

            $this->error($e);
        }
    }
}
