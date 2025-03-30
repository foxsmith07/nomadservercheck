<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrainRequest;
use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trains = Train::all()->sortBy(['name','asc']);
        return view('pages.train.index_train', compact('trains'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.train.create_train');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrainRequest $request)
    {
        Train::create([
            'number' => $request->input('number'),
            'name' => $request->input('name'),
            'tipology' => $request->input('tipology'),
        ]);

        return redirect()->route('train.index')->with('success','Train successfully added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Train $train)
    {
        return view('pages.train.edit_train',compact('train'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrainRequest $request, Train $train)
    {
        $train->update([
            'number' => $request->input('number'),
            'name' => $request->input('name'),
            'tipology' => $request->input('tipology'),
        ]);

        return redirect()->route('train.index')->with('success','Train successfully updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Train $train)
    {
        $train->delete();

        return redirect()->route('train.index')->with('success','Train successfully deleted!!');
    }
}
