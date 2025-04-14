<?php

namespace App\Http\Controllers;

use App\Http\Requests\CovRequest;
use App\Models\Covreport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CovreportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ottieni la data corrente
        $now = Carbon::now();

        // Ottieni il primo e l'ultimo giorno del mese corrente
        $startOfMonth = $now->startOfMonth()->toDateString();
        $endOfMonth = $now->endOfMonth()->toDateString();

        $covs = Covreport::orderBy('datetime','desc')->get()->groupBy(function ($covs) {
            return Carbon::parse($covs->datetime)->format('d F Y');
        });

        // Conta tutte le chiamate del mese corrente
        $monthlyCallCount = Covreport::whereBetween('datetime', [$startOfMonth . ' 00:00:00', $endOfMonth . ' 23:59:59'])->count();

        // $covs = Covreport::all()->sortByDesc('created_at');
        return view('pages.cov.index_cov', compact('covs','monthlyCallCount'));
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
    public function store(CovRequest $request)
    {
        
        // Converti la data da "31 Mar 2025 - 16:00" a "2025-03-31 16:00:00"
        $datetime = Carbon::createFromFormat('d M Y - H:i', $request->datetime)->format('Y-m-d H:i:s');

        Covreport::create([
            'datetime'=>$datetime,
            'train_id'=>$request->input('train_id'),
            'worker'=>$request->input('worker'),
            'request'=>$request->input('request'),
            'resolved'=>$request->input('resolved'),
            'ticket'=>$request->input('ticket'),
            'note'=>$request->input('note'),
        ]);

        return redirect()->route('cov.index')->with('success','Cov Report successfully addedd!!');
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
    public function edit(Covreport $cov)
    {
        return view('pages.cov.edit_cov',compact('cov'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CovRequest $request, Covreport $cov)
    {
        // Conversione della data nel formato corretto
        $datetime = Carbon::createFromFormat('d M Y - H:i', $request->datetime)->format('Y-m-d H:i:s');
        
        $cov->update([
            'train_id'=>$request->input('train_id'),
            'datetime'=>$datetime,
            'resolved'=>$request->input('resolved'),
            'request'=>$request->input('request'),
            'worker'=>$request->input('worker'),
            'ticket'=>$request->input('ticket'),
            'note'=>$request->input('note'),
        ]);

        return redirect()->route('cov.index')->with('success','Cov Report successfully updated!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Covreport $cov)
    {
        $cov->delete();

        return redirect()->route('cov.index')->with('success','Cov Report successfully deleted!!');
    }
}
