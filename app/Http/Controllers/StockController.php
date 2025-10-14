<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

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

        return view('pages.stock.index_stock', compact('item_count','esauriti_count','ordinati_count','arrivo_count','esauriti','ordinati','arrivo'));
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
        return view('pages.stock.show_stock',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
