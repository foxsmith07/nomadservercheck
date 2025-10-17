<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Spatie\Ssh\Ssh;

class Playmovie extends Component
{
    public $cinema = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25];

    public $train;
    public $search;
    public $movies;
    public $film;
    public $output;
    public $unreachable;

//! MODIFICARE LA VARIABILE IOBCINEMA IN PLAY AND RUN MOMENTANEAMENTE FINCHE' NON DIVENTANO TUTTI IOB E CANCELLIAMO L'IF IN ARRAY

    public function play()
    {

        $this->reset(['movies', 'output', 'unreachable', 'film']);

        $this->movies = null;
        $this->output = null;
        $this->unreachable = null;
        $this->film = null;
        $iobcinema = [6, 12, 15, 16, 21];


        // dd([$this->train , $this->search , $this->unreachable ]);

        if ($this->search == null) {;

            try {

                if (in_array($this->train, $iobcinema)) {

                    exec('timeout 120s ping -c 3 -w 5 10.146.' . $this->train . '.1', $output, $ping);
                } else {
                    exec('timeout 120s ping -c 3 -w 5 10.131.' . $this->train . '.1', $output, $ping);
                }
            } catch (\Throwable $th) {
                Log::alert($th);
                $this->unreachable = $th->getMessage();
            }

            if ($ping == 0) {

                $this->unreachable = null;
                try {
                    if (in_array($this->train, $iobcinema)) {

                        $this->movies = Ssh::create('developer', '10.146.' . $this->train . '.1')
                            ->disableStrictHostKeyChecking()
                            ->setTimeout(10)
                            ->execute('timeout 120s ls /media/movies')
                            ->getOutput();
                        // $this->movies = 'E un treno iob';
                    } else {
                        $this->movies = Ssh::create('developer', '10.131.' . $this->train . '.1')
                            ->disableStrictHostKeyChecking()
                            ->setTimeout(10)
                            ->execute('timeout 120s ls /media/movies')
                            ->getOutput();
                    }
                } catch (\Throwable $th) {
                    $this->unreachable = $th->getMessage();
                }
            } else {
                $this->unreachable = "Train " . $this->train . " Unreachable";
            }
        } else {

            try {

                if (in_array($this->train, $iobcinema)) {

                    exec('timeout 120s ping -c 3 -w 5 10.146.' . $this->train . '.1', $output, $ping);
                } else {
                    exec('timeout 120s ping -c 3 -w 5 10.131.' . $this->train . '.1', $output, $ping);
                }
            } catch (\Throwable $th) {
                Log::alert($th);
            }

            if ($ping == 0) {
                $this->unreachable = null;
                # code...
                try {
                    //code...
                    if (in_array($this->train, $iobcinema)) {
                    
                        $this->movies = Ssh::create('developer', '10.146.' . $this->train . '.1')
                            ->disableStrictHostKeyChecking()
                            ->setTimeout(10)
                            ->execute('timeout 120s ls /media/movies | grep -i ' . $this->search)
                            ->getOutput();
                        } else {
                        $this->movies = Ssh::create('developer', '10.131.' . $this->train . '.1')
                            ->disableStrictHostKeyChecking()
                            ->setTimeout(10)
                            ->execute('timeout 120s ls /media/movies | grep -i ' . $this->search)
                            ->getOutput();
                        }

                } catch (\Throwable $th) {
                    $this->unreachable = $th->getMessage();
                }
            } else {
                # code...
                $this->unreachable = "Train " . $this->train . " Unreachable";
            }
        }
    }

    public function run()
    {
        $iobcinema = [6, 12, 15, 16, 21];

        try {
            
            if (in_array($this->train, $iobcinema)) {

                $this->output = Ssh::create('developer', '10.146.' . $this->train . '.1')
                    ->disableStrictHostKeyChecking()
                    ->setTimeout(20)
                    ->execute("timeout 120s curl -s --show-error http://localhost:2323/cinema/server/play/" . $this->film)
                    ->getOutput();
            } else {

                $this->output = Ssh::create('developer', '10.131.' . $this->train . '.1')
                    ->disableStrictHostKeyChecking()
                    ->setTimeout(20)
                    ->execute("timeout 120s curl -s --show-error http://localhost:2323/cinema/server/play/" . $this->film)
                    ->getOutput();
            }
        } catch (\Throwable $th) {
            $this->output = "ERRORE: " . $th->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.playmovie');
    }
}
