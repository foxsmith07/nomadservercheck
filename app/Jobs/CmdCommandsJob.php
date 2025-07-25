<?php

namespace App\Jobs;

use Spatie\Ssh\Ssh;
use App\Models\Train;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class CmdCommandsJob implements ShouldQueue
{
    use Queueable;

    public $cmd;
    public $train;
    /**
     * Create a new job instance.
     */
    public function __construct($_cmd , $_train)
    {
        //
        $this->cmd = $_cmd;
        $this->train = $_train;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $cmd = $this->cmd;;
        $train = $this->train;;

        if ($train == 'all') {
            $choose='all';
            $trains = Train::all();

            foreach ($trains as $train) {
            
                if ($train->tipology == 'iob') {
                    
                    try {
                        exec('ping -c 3 -w 3 10.226.' . $train->number . '.1', $output, $ping);
                    } catch (\Throwable $e) {
                        Log::alert($e);
                    }
                    
                    if ($ping == 0) {
                        $result = Ssh::create('developer', '10.226.' . $train->number . '.1')->execute($cmd)->getOutput();
                        
                    } else {
                        $result = "Train ".$train->number." Unreachable";
                    }
    
                    $outputs[] = [
                        'number' => $train->number,
                        'output' => $result,
                    ];

                } else {

                    exec('ping -c 3 -w 3 10.131.' . $train->number . '.1', $output, $ping);
                    
                    if ($ping == 0) {
                        $result = Ssh::create('developer', '10.131.' . $train->number . '.1')->execute($cmd)->getOutput();
                        
                    } else {
                        $result = "Train ".$train->number." Unreachable";
                    }
    
                    $outputs[] = [
                        'number' => $train->number,
                        'output' => $result,
                    ];
                }
            }


        } elseif ($train == 'iob') {
            $choose='iob';
            $trains = Train::where('tipology', 'iob')->get();

            foreach ($trains as $train) {
                # code...
                exec('ping -c 3 -w 3 10.226.' . $train->number . '.1', $output, $ping);
                
                if ($ping == 0) {
                    $result = Ssh::create('developer', '10.226.' . $train->number . '.1')->execute($cmd)->getOutput();
                    
                } else {
                    $result = "Train ".$train->number." Unreachable";
                }

                $outputs[] = [
                    'number' => $train->number,
                    'output' => $result,
                ];
            }
        } elseif ($train == 'deb10') {
            $choose='deb10';
            $trains = Train::where('tipology', 'deb10')->get();

            foreach ($trains as $train) {
                # code...
                exec('ping -c 3 -w 3 10.131.' . $train->number . '.1', $output, $ping);
                
                if ($ping == 0) {
                    $result = Ssh::create('developer', '10.131.' . $train->number . '.1')->execute($cmd)->getOutput();
                    
                } else {
                    $result = "Train ".$train->number." Unreachable";
                }

                $outputs[] = [
                    'number' => $train->number,
                    'output' => $result,
                ];
            }

        } else {

            $choose='one';
            $trains = Train::where('number', $train)->first();

            if ($trains->tipology == 'iob') {

                exec('ping -c 3 -w 3 10.226.' . $trains->number . '.1', $output, $ping);

                if ($ping == 0) {
                    $outputs = Ssh::create('developer', '10.226.' . $trains->number . '.1')->execute($cmd)->getOutput();

                } else {
                    $outputs = "Train ".$trains->number." Unreachable";
                }

            } else {

                exec('ping -c 3 -w 3 10.131.' . $trains->number . '.1', $output, $ping);

                if ($ping == 0) {
                    $outputs = Ssh::create('developer', '10.131.' . $trains->number . '.1')->execute($cmd)->getOutput();

                } else {
                    $outputs = "Train ".$trains->number." Unreachable";
                }
            }

        }
        // $output = Ssh::create('developer','10.131.'.$train.'.1')->execute($cmd)->getOutput();

        // return view('pages.cmd.output_cmd', compact('cmd', 'trains','choose','outputs'));
        // return redirect()->route('cmd.responde');
    }
}
