<?php

namespace App\Http\Controllers;

use App\Http\Requests\SivRequest;
use App\Models\Siv;
use Illuminate\Http\Request;

class SivController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sivs = Siv::all();
        $sivsCount = Siv::count();

        return view('pages.siv.index_siv', compact('sivs', 'sivsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.siv.create_siv');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SivRequest $request)
    {
        Siv::create([
            'train_id' => $request->input('train_id'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('siv.index')->with('success', 'SIV Request successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siv $siv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siv $siv)
    {
        return view('pages.siv.edit_siv', compact('siv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SivRequest $request, Siv $siv)
    {
        $siv->update([
            'train_id' => $request->input('train_id'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('siv.index')->with('success', 'SIV Request successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siv $siv)
    {
        $siv->delete();

        return redirect()->route('siv.index')->with('success', 'SIV Request successfully deleted!');
    }
}
