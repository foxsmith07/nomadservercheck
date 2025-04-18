<?php

namespace App\Livewire;

use App\Models\boxuser;
use App\Models\Obn;
use Livewire\Component;

class Obnindex extends Component
{
    
    public function render()
    {
        $users= boxuser::all();
        $treni = Obn::select('train')->distinct()->get(); //DISTINCT - rimuove i duplicati. Se hai più righe con lo stesso train, ne prende solo una
    
        $tabella = [];
        foreach ($treni as $treno) {
            $usernum = boxuser::where('train', $treno->train )->get();
            $ap = Obn::where('train', $treno->train)->where('type', 'AP')->get();
            $sw = Obn::where('train', $treno->train)->where('type', 'SW')->get();
            $updated_at = Obn::where('train', $treno->train)
            ->orderBy('updated_at', 'asc') // Ordina per updated_at in modo crescente
            ->value('updated_at'); // Ottieni solo il valore della colonna 'updated_at';
    
            $tabella[] = [
                'usernum' => $usernum,
                'train' => $treno->train,
                'ap' => $ap,
                'sw' => $sw,
                'updated_at' => $updated_at,
            ];
        }
        return view('livewire.obnindex', compact('tabella','users'));
    }
}
