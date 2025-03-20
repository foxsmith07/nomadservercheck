<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TrainPdfViewer extends Component
{
    public $selectedTrain = null;
    public $trains = [32, 37, 38, 45, 52];

    public function render()
    {
        return view('livewire.train-pdf-viewer');
    }
}