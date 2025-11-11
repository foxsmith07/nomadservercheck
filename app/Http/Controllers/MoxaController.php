<?php

namespace App\Http\Controllers;

use App\Models\Moxa;
use App\Models\Train;
use Illuminate\Http\Request;

class MoxaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainsiobagv = Train::where('tipology','iob')->where('name', 'like', '%agv%')->get();
        $trainsiobevo = Train::where('tipology','iob')->where('name', 'like', '%evo%')->get();

        return view('pages.moxa.index_moxa',compact('trainsiobagv','trainsiobevo'));
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
    public function show(Moxa $moxa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Moxa $moxa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Moxa $moxa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Moxa $moxa)
    {
        //
    }
}
