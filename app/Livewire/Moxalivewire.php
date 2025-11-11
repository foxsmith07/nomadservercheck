<?php

namespace App\Livewire;

use App\Models\Moxa;
use App\Models\Train;
use Livewire\Component;
use Illuminate\Support\Facades\Process;
use Spatie\Ssh\Ssh;

class Moxalivewire extends Component
{

    // public $train;
    // public $datas = [];
    // public $validate;

    // public function mount(){

    // }

    public function check($id){

        $train = Train::findOrFail($id);

        // dd($train->number);
        // $validate = Process::run('ssh -o "StrictHostKeyChecking no" developer@10.146.6.1 "hostname"');
        $validate = Ssh::create('developer','10.146.{$train->number}.1')
            ->disableStrictHostKeyChecking()
            ->execute('hostname -f')
            ->getOutput();

        // dd($validate);

        return $validate;
    }

    public function render()
    {
        $trainsiobagv = Train::where('tipology','iob')->where('name', 'like', '%agv%')->get();
        $trainsiobevo = Train::where('tipology','iob')->where('name', 'like', '%evo%')->get();
        
        return view('livewire.moxalivewire',compact('trainsiobevo','trainsiobagv'));
    }
}
