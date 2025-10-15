<?php

namespace App\Livewire;

use Exception;
use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;
use SweetAlert2\Laravel\Swal;

class Inventorylivewire extends Component
{
    use WithPagination;
    
    public $search = '';

    public $name;
    public $description;
    public $quantity_stock;
    public $position;
    
    public function save()
    {

        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity_stock' => 'required|integer',
            'position' => 'required',
        ]);

        try {
            $new_item = new Item;

            $new_item->name = $this->name;
            $new_item->description = $this->description;
            $new_item->quantity_stock = $this->quantity_stock;
            $new_item->position = $this->position;

            $new_item->save();

            $this->redirect('/stock-management');

            Swal::fire([
                'position' => "top-end",
                'icon' => "success",
                'title' => "Item successfully added",
                'showConfirmButton' => false,
                'timer' => 1800
            ]);
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function render()
    {
        if ($this->search == '') {
            $inventory = Item::paginate(10);
        } else {
            $inventory = Item::whereAny(['name', 'description', 'position'], 'LIKE', '%' . $this->search . '%')->paginate(10);
        }


        return view('livewire.inventorylivewire', compact('inventory'));
    }
}
