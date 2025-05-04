<?php

namespace App\Livewire;

use App\Models\boxuser;
use App\Models\Obn;
use App\Models\Train;
use Livewire\Component;

class Obnindex extends Component
{
    
    public function render()
    {

        // $obns = Obn::select('train_id')->distinct()->get();

        // dd($obns);

        $trains = Train::with(['switches','accessPoints'])
                        ->whereHas('obns')
                        ->get();

        return view('livewire.obnindex',compact('trains'));
    }
}
