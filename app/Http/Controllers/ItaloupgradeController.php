<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItaloupgradeRequest;
use App\Models\roadmap;
use Illuminate\Http\Request;

class ItaloupgradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roadmap = roadmap::orderByDesc('created_at')->get();

        return view('pages.italoupgrade.index_italoupgrade',compact('roadmap'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.italoupgrade.create_italoupgrade');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItaloupgradeRequest $request)
    {
        roadmap::create([
            'train_id' => $request->input('train_id'),
            'serial' => $request->input('serial'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'location' => $request->input('location'),
            'fluke' => $request->input('fluke'),
            'note' => $request->input('note'),
        ]);

        return redirect()->route('italoupgrade.index')->with('success', 'iob upgrade train successfully created!');
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
    public function edit(roadmap $item)
    {
        return view('pages.italoupgrade.edit_italoupgrade',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItaloupgradeRequest $request, roadmap $item)
    {
        $item->update([
            'train_id' => $request->input('train_id'),
            'serial' => $request->input('serial'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'location' => $request->input('location'),
            'fluke' => $request->input('fluke'),
            'note' => $request->input('note'),        
        ]);

        return redirect()->route('italoupgrade.index')->with('success','iob upgrade train successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(roadmap $item)
    {
        $item->delete();
        
        return redirect()->route('italoupgrade.index')->with('success','iob upgrade train successfully deleted!');
    }
}
