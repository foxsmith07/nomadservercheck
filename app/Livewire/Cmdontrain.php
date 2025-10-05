<?php

namespace App\Livewire;

use App\Models\Train;
use Spatie\Ssh\Ssh;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Cmdontrain extends Component
{
    public $train = ''; //fatto cosi per la selected disabled
    public $cmd;
    public $output = '';
    public $outputs = [];
    public $nok = false;
    public $treno;

    public $count = 0;
    public $progress = 0;

    public function check()
    {
        // dd($this->train);

        // $this->reset([
        //     'output',
        //     'outputs',
        //     'nok',
        //     'treno',
        //     'count',
        //     'progress',
        // ]);

        $this->validate([
            'train' => 'required|not_in:""', // blocca il value vuoto
            'cmd' => 'required|string',
        ]);

        $this->output = '';
        $this->outputs = [];
        $this->nok = false;
        $this->treno = null;
        $this->count = 0;
        $this->progress = 0;

        // ACTION -> ALL TRAINS
        if ($this->train == 'all') {

            $trains = Train::orderBy('number', 'asc')->get();
            $this->count = Train::all()->count();

            foreach ($trains as $train) {

                $nok = false;

                if ($train->tipology == 'iob') {

                    try {
                        exec('ping -c 3 -w 5 10.146.' . $train->number . '.1', $output, $ping);
                    } catch (\Throwable $e) {
                        Log::alert($e);
                    }

                    if ($ping == 0) {
                        try {

                            $result = Ssh::create('developer', '10.146.' . $train->number . '.1')
                                ->disableStrictHostKeyChecking()
                                ->setTimeout(5)
                                ->execute('timeout 5 ' . $this->cmd)
                                ->getOutput();
                        } catch (\Throwable $th) {
                            Log::alert($th);
                            $result = "Train Error: " . $th->getMessage();
                            $nok = true;
                        }
                    } else {
                        $result = "Train " . $train->number . " Unreachable";
                        $nok = true;
                    }

                    $this->outputs[] = [
                        'number' => $train->number,
                        'output' => $result,
                        'nok' => $nok,
                    ];
                } else {

                    try {
                        exec('ping -c 3 -w 5 10.131.' . $train->number . '.1', $output, $ping);
                    } catch (\Throwable $e) {
                        Log::alert($e);
                    }

                    if ($ping == 0) {
                        try {

                            $result = Ssh::create('developer', '10.131.' . $train->number . '.1')
                                ->disableStrictHostKeyChecking()
                                ->setTimeout(5)
                                ->execute('timeout 5 ' . $this->cmd)
                                ->getOutput();
                        } catch (\Throwable $th) {
                            Log::alert($th);
                            $result = "Train Error: " . $th->getMessage();
                            $nok = true;
                        }
                    } else {
                        $result = "Train " . $train->number . " Unreachable";
                        $nok = true;
                    }

                    $this->outputs[] = [
                        'number' => $train->number,
                        'output' => $result,
                        'nok' => $nok,
                    ];
                }
            }

            // todo ACTION -> IOB

        } elseif ($this->train == 'iob') {

            $trains = Train::where('tipology', 'iob')->get();
            $this->count = Train::where('tipology', 'iob')->count();

            foreach ($trains as $train) {

                $nok = false;
                $this->progress = 0;

                try {
                    exec('ping -c 3 -w 5 10.146.' . $train->number . '.1', $output, $ping);
                } catch (\Throwable $e) {
                    Log::alert($e);
                }

                if ($ping == 0) {
                    try {

                        $result = Ssh::create('developer', '10.146.' . $train->number . '.1')
                            ->disableStrictHostKeyChecking()
                            ->setTimeout(10)
                            ->execute('timeout 5 ' . $this->cmd)
                            ->getOutput();
                    } catch (\Throwable $th) {
                        Log::alert($th);
                        $result = "Train Error: " . $th->getMessage();
                        $nok = true;
                    }
                } else {
                    $result = "Train " . $train->number . " Unreachable";
                    $nok = true;
                }

                $this->outputs[] = [
                    'number' => $train->number,
                    'output' => $result,
                    'nok' => $nok,
                ];
                $this->progress++;
            }
        } elseif ($this->train == 'deb10') {

            $trains = Train::where('tipology', 'deb10')->get();

            foreach ($trains as $train) {

                $nok = false;

                try {
                    exec('ping -c 3 -w 5 10.131.' . $train->number . '.1', $output, $ping);
                } catch (\Throwable $e) {
                    Log::alert($e);
                }

                if ($ping == 0) {
                    try {

                        $result = Ssh::create('developer', '10.131.' . $train->number . '.1')
                            ->disableStrictHostKeyChecking()
                            ->setTimeout(10)
                            ->execute('timeout 5 ' . $this->cmd)
                            ->getOutput();
                    } catch (\Throwable $th) {
                        Log::alert($th);
                        $result = "Train Error: " . $th->getMessage();
                        $nok = true;
                    }
                } else {
                    $result = "Train " . $train->number . " Unreachable";
                    $nok = true;
                }

                $this->outputs[] = [
                    'number' => $train->number,
                    'output' => $result,
                    'nok' => $nok,
                ];
            }
        } elseif ($this->train == '') {

            $this->reset();
            $treno = null;

        } else {

            $this->outputs = [];
            $this->output = '';
            $this->count = 1;
            $this->progress = 1;
            $this->nok = false;
            $this->treno = null;

            $traintocheck = Train::where('number', $this->train)->first();

            // dd($trains);

            if ($traintocheck->tipology == 'iob') {


                try {
                    exec('ping -c 3 -w 3 10.146.' . $this->train . '.1', $result, $ping);
                } catch (\Throwable $e) {
                    
                    Log::alert($e);
                    $this->output = $e->getMessage();
                    $nok = true;
                }
                
                if ($ping == 0) {
                    $this->output = Ssh::create('developer', '10.146.' . $this->train . '.1')
                    ->disableStrictHostKeyChecking()
                    ->execute('timeout 5 ' . $this->cmd)
                    ->getOutput();
                } else {
                    $this->output = "Train " . $this->train . " Unreachable";
                    $nok = true;
                }
                
                $this->treno = $this->train;
            } else {
                
                $this->nok = false;;
                $this->count = 1;
                
                try {
                    exec('ping -c 3 -w 3 10.131.' . $this->train . '.1', $result, $ping);
                } catch (\Throwable $e) {
                    
                    Log::alert($e);
                    $this->output = $e->getMessage();
                    $this->nok = true;
                }
                
                if ($ping == 0) {
                    $this->output = Ssh::create('developer', '10.131.' . $this->train . '.1')
                    ->disableStrictHostKeyChecking()
                        ->execute('timeout 5 ' . $this->cmd)
                        ->getOutput();
                } else {
                    $this->output = "Train " . $this->train . " Unreachable";
                    $this->nok = true;
                }

                $this->treno = $this->train;
            }
        }

        // dd([$this->train,$this->treno]);
        // dd($this->output);
    }

    public function redirigi(){

        $this->redirectRoute('cmd.index');
    }

    public function render()
    {

        return view('livewire.cmdontrain');
    }
}
