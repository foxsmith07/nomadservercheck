<?php

namespace App\Http\Controllers;

use App\Models\Obn;
use Spatie\Ssh\Ssh;
use App\Models\Train;
use Illuminate\Http\Request;

class ObnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('pages.obn.index_obn');
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
    // public function show(Request $obn)
    public function show(Train $train)
    {

        return view('pages.obn.show_obn', compact('train'));
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

    public function rtcheck(Train $train){

        $id = $train->number;

        exec('ping -c 3 -w 3 10.226.'.$id.'.1',$output,$ping);

        if ($ping == 0) {
            $output = Ssh::create('developer','10.226.'.$id.'.1')
            ->execute([
                'echo "Utenti: $(sudo /usr/local/bin/count_client.sh 1)"',
                'echo',
                'echo MODEM STATUS',
                'marcli all | grep -A2 ce0p0',
                'echo',
                'echo',
                'sudo obn validate | grep -i -w -A10 "switch"',
                'echo',
                'echo',
                'sudo obn validate | grep -i -w -A17 "access point"',
                'echo',
    
                ])->getOutput();

        } else {
            $output = "Train Unreachable";
        }

        return view('pages.obn.rtcheck',compact('train','output'));
    }

    public function allCheck(){
        
        $train = Train::where('tipology','iob')->get()->first();

        // $trains = Train::where('tipology','iob')->get();

        // foreach ($trains as $train) {
            
        //     exec('ping -c 3 -w 3 10.226.'.$train->number.'.1', $output, $ping);

        //     if ($ping == 0 ){
        //         $output = Ssh::create('developer','10.226.'.$train->number.'.1')->execute('hostname')->getOutput();
        //     } else {
        //         $output = 'Train Unreachable';
        //     }

        //     $outputs[] = [
        //         'number' => $train->number,
        //         'output' => $output,
        //     ];
        // }

        exec('ping -c 3 -w 3 10.226.'.$train->number.'.1', $output, $ping);

        if ($ping == 0 ){
            $output = Ssh::create('developer','10.226.'.$train->number.'.1')->execute('sudo obn validate')->getOutput();

            // 1. Pulisci i codici ANSI (colori terminale)
            $output = preg_replace('/\e\[[\d;]*m/', '', $output);

            // 2. Spezza l'output in righe
            $output = explode("\n", $output);


        } else {
            $output = 'Train Unreachable';
        }

        return view('pages.obn.index_obn',compact('output','train'));
        // return redirect()->route('obn.index')->with('success',$outputs);
    }
}
