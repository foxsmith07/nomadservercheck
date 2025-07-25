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
    public $output;
    public $outputs;
    public $nok;
    public $treno;

    public function check()
    {
        // dd($this->train);
        $this->validate([
            'train' => 'required|not_in:""', // blocca il value vuoto
            'cmd' => 'required|string',
        ]);

        $this->output = null;
        $this->outputs = [];
        $this->treno = null;

        // ACTION -> ALL TRAINS
        if ($this->train == 'all') {

            $trains = Train::orderBy('number', 'asc')->get();

            foreach ($trains as $train) {

                $nok = false;

                if ($train->tipology == 'iob') {

                    try {
                        exec('ping -c 3 -w 5 10.226.' . $train->number . '.1', $output, $ping);
                    } catch (\Throwable $e) {
                        Log::alert($e);
                    }

                    if ($ping == 0) {
                        try {

                            $result = Ssh::create('developer', '10.226.' . $train->number . '.1')
                                ->disableStrictHostKeyChecking()
                                ->setTimeout(5)
                                ->execute($this->cmd)
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
                                ->execute($this->cmd)
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

            foreach ($trains as $train) {

                $nok = false;

                try {
                    exec('ping -c 3 -w 5 10.226.' . $train->number . '.1', $output, $ping);
                } catch (\Throwable $e) {
                    Log::alert($e);
                }

                if ($ping == 0) {
                    try {

                        $result = Ssh::create('developer', '10.226.' . $train->number . '.1')
                            ->disableStrictHostKeyChecking()
                            ->setTimeout(10)
                            ->execute($this->cmd)
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
                            ->execute($this->cmd)
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

            $trains = Train::where('number', $this->train)->first();


            if ($trains->tipology == 'iob') {

                $nok = false;

                try {
                    exec('ping -c 3 -w 3 10.226.' . $this->train . '.1', $result, $ping);
                } catch (\Throwable $e) {

                    Log::alert($e);
                    $this->output = $e->getMessage();
                    $nok = true;
                }

                if ($ping == 0) {
                    $this->output = Ssh::create('developer', '10.226.' . $this->train . '.1')
                        ->disableStrictHostKeyChecking()
                        ->execute($this->cmd)
                        ->getOutput();
                } else {
                    $this->output = "Train " . $this->train . " Unreachable";
                    $nok = true;
                }

                $this->treno = $this->train;

            } else {

                $nok = false;


                try {
                    exec('ping -c 3 -w 3 10.131.' . $this->train . '.1', $result, $ping);
                } catch (\Throwable $e) {

                    Log::alert($e);
                    $this->output = $e->getMessage();
                    $nok = true;
                }

                if ($ping == 0) {
                    $this->output = Ssh::create('developer', '10.131.' . $this->train . '.1')
                        ->disableStrictHostKeyChecking()
                        ->execute($this->cmd)
                        ->getOutput();
                } else {
                    $this->output = "Train " . $this->train . " Unreachable";
                    $nok = true;
                }

                $this->treno = $this->train;
            }

        }

    }

    public function render()
    {

        return view('livewire.cmdontrain');
    }
}
