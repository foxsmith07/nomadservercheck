<?php

namespace App\Http\Controllers;

use App\Models\Covreport;
use Illuminate\Http\Request;

class CovreportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $covs = Covreport::all()->sortByDesc('created_at');
        return view('pages.cov.index_cov', compact('covs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.cov.create_cov');
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
    public function show(Covreport $covreport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Covreport $covreport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Covreport $covreport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Covreport $covreport)
    {
        //
    }
}
