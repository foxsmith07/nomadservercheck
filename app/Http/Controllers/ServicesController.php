<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use App\Mail\ServiceClosingMail;
use Illuminate\Support\Facades\Mail;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services=Services::all();
        return view('pages.servizio.index_servizio',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.servizio.create_servizio');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {

        Services::create([
            'event'=>$request->input('event'),
            'train'=>$request->input('train'),
            'impact'=>$request->input('impact'),
            'start_expected'=>$request->input('start_expected'),
            'start_actual'=>$request->input('start_actual'),
            'end_expected'=>$request->input('end_expected'),
        ]);
        
        $train = $request->input('train');
        $event = $request->input('event');
        $impact = $request->input('impact');
        $start_expected = $request->input('start_expected');
        $start_actual = $request->input('start_actual');
        $end_expected = $request->input('end_expected');

        $mail=compact('train','event','impact','start_expected','start_actual','end_expected');

        Mail::to('italo@ntv.it')->send(new ServiceClosingMail($mail));

        return redirect()->route('servizio.index')->with('success','Service closed and mail sent!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $service)
    {
        return view('pages.servizio.show_servizio', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Services $services)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $service)
    {
        $service-> delete();

        return redirect()->route('servizio.index')->with('success','chiusura di servizio cancellata!!');
    }
}
