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
    protected $description = 'on 1st of the month send \'cov report mail\' with counter previous month';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startMonth = now()->startOfMonth();


        $this->info('inizio mese corrente: '.$startMonth);

        $mail = 'fortunato.di.domenico@nomadrail.com';
        $countCov = Covreport::all()->count();


        $this->warn('chiamate COV: '.$countCov);
        $this->warn('da mandare a: '.$mail);

        $data = compact('mail','countCov');

        try {
            Mail::to($mail)->cc('fortunato.didomenico@gmail.com')->send(new ReportCovCallsMail($data));

            $this->info('mail inviata');
        } catch (\Exception $e) {
            
            $this->error($e);
        }


    }
}
