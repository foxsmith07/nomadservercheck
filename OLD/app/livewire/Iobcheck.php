<?php

namespace App\Livewire;

use App\Models\Train;
use Livewire\Component;

class Iobcheck extends Component
{

    public $selectedTrain = null; // ID del treno selezionato
    public $trainOutput = ''; // Output formattato del treno

    public function mount()
    {
        // Se esiste almeno un treno, selezioniamo il primo
        $this->selectedTrain = Train::first()?->id;
        $this->loadTrainOutput();
    }

    public function loadTrainOutput()
    {
        // Se esiste un treno selezionato, prendiamo il suo output dal database
        if ($this->selectedTrain) {
            $train = Train::find($this->selectedTrain);
            $this->trainOutput = $train->obn ?? 'Nessun dato disponibile';
        } else {
            $this->trainOutput = 'Nessun dato disponibile';
        }
    }

    public function updatedSelectedTrain()
    {
        // Quando cambia la selezione del treno, aggiorniamo l'output
        $this->loadTrainOutput();
    }

    public function render()
    {
        return view('livewire.iobcheck',['trains'=> Train::all()]);
    }
}
