<?php

namespace App\Livewire;

use App\Models\roadmap;
use Livewire\Component;

class Italoupgrade extends Component
{
    public $train_id;
    public $serial;
    public $start;
    public $end;
    public $location;
    public $fluke;
    public $note;
    public $item;

    public function save(){

        roadmap::create([
            'train_id' => $this->train_id,
            'serial' => $this->serial,
            'start' => $this->start,
            'end' => $this->end,
            'location' => $this->location,
            'fluke' => $this->fluke,
            'note' => $this->note,
        ]);

        // $this->reset();

        return $this->redirect('/italo-upgrade');
    }

    // public function mount($item){
        
    //     $this->item = roadmap::findOrFail($item);
    // }

    public function update(){

        roadmap::update([

            'train_id' => $this->train_id,
            'serial' => $this->serial,
            'start' => $this->start,
            'end' => $this->end,
            'location' => $this->location,
            'fluke' => $this->fluke,
            'note' => $this->note,        
        ]);

        
    }

    public function render()
    {
        $roadmap = roadmap::all();

        return view('livewire.italoupgrade', compact('roadmap'));
    }
}
