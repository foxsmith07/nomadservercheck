<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use SweetAlert2\Laravel\Swal;
use App\Http\Requests\ItemRequest;
use App\Http\Requests\ItemRequestMail;
use App\Mail\RequestItemMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //? WIDGET
        $item_count = Item::all()->count();
        $esauriti_count = Item::where('quantity_stock', 0)->count();
        $ordinati_count = Item::where('quantity_ordered', '>', 0)->count();
        $arrivo_count = Item::where('quantity_shipped', '>', 0)->count();

        //? COLLECTIONS
        $esauriti = Item::where('quantity_stock', 0)->get();
        $ordinati = Item::where('quantity_ordered', '>', 0)->get();
        $arrivo = Item::where('quantity_shipped', '>', 0)->get();

        return view('pages.stock.index_stock', compact('item_count', 'esauriti_count', 'ordinati_count', 'arrivo_count', 'esauriti', 'ordinati', 'arrivo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('pages.stock.show_stock', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('pages.stock.edit_stock', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemRequest $request, Item $item)
    {
        $item->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'quantity_stock' => $request->input('quantity_stock'),
            'position' => $request->input('position'),
            'nmid' => $request->input('nmid'),
        ]);
        
        Swal::fire([
            'position' => "center",
            'icon'=> "success",
            'title' => 'Item successfully updated!!',
            'showConfirmButton'=> false,
            'timer'=> 1500,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->back()->with('success','Item successfully deleted!!');
    }

    public function requestItem(Item $item)
    {
        return view('pages.stock.request_item_stock', compact('item'));
    }

    public function sendRequestItem(ItemRequestMail $request)
    {
        $name = $request->input('name');
        $nmid = $request->input('nmid');
        $quantity = $request->input('quantity');
        $description = $request->input('description');
        $user_name = Auth::user()->name;
        $user_mail = Auth::user()->email;
        
        $userData = compact('name','nmid','quantity','user_name','user_mail','description');

        // dd($userData);

        try {
            Mail::to('nola@nomadrail.com')->send(new RequestItemMail($userData));
            return redirect()->back()->with('success','Request successfully sent!!');

        } catch (\Exception $e) {
            Log::error('Errore invio mail di test: ' . $e->getMessage());
            return redirect()->route('servizio.index')->with('success',$e->getMessage());
        }
            
    }
}
