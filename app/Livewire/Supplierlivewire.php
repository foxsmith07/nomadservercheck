<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Supplier;
use Illuminate\Support\Composer;

class Supplierlivewire extends Component
{
    
    public function render()
    {
        $suppliers = Supplier::all();

        return view('livewire.supplierlivewire',compact('suppliers'));
    }
}
