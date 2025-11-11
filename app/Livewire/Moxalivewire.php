<?php

namespace App\Livewire;

use App\Models\Moxa;
use App\Models\Train;
use Livewire\Component;
use Illuminate\Support\Facades\Process;
use Spatie\Ssh\Ssh;

class Moxalivewire extends Component
{

    public $test;
    public $datas = [];
    public $validate;

    public function mount(){

    }

    public function check(){

        $this->validate = Ssh::create('developer','10.146.6.1')
            ->disableStrictHostKeyChecking()
            ->setTimeout(5)
            ->execute('pwd')
            ->getOutput();

        dd($this->validate);
    }

    public function render()
    {
        $trainsiobagv = Train::where('tipology','iob')->where('name', 'like', '%agv%')->get();
        $trainsiobevo = Train::where('tipology','iob')->where('name', 'like', '%evo%')->get();
        
        return view('livewire.moxalivewire',compact('trainsiobevo','trainsiobagv'));
    }
}
