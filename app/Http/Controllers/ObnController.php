<?php

namespace App\Http\Controllers;

use App\Models\Obn;
use Spatie\Ssh\Ssh;
use App\Models\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

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
            $cmd = Ssh::create('developer','10.226.'.$id.'.1')
            ->execute([
                'echo "Utenti: $(sudo /usr/local/bin/count_client.sh 1)"',
                'echo',
                // 'echo',
                // 'sudo obn validate | grep -i -w -A10 "switch"',
                // 'echo',
                'echo',
                'echo VALIDATE...',
                // 'echo',
                'sudo obn validate',
                // 'sudo obn validate | grep -i -w -A17 "access point"',
                'echo',
                'echo MODEM STATUS...',
                'echo',
                'marcli all | grep -A2 ce0p0',
                'echo',
    
                ])->getOutput();

            $output = preg_replace('/\e\[[\d;]*m/', '', $cmd);
        } else {
            $output = "Train Unreachable";
        }

        return view('pages.obn.rtcheck',compact('train','output'));
    }

    public function allCheck(){
        

        Artisan::call('check:obn');
        
        $output = Artisan::output();

        Log::info($output);


        // return view('pages.obn.index_obn');
        // return view('pages.obn.index_obn',compact('output','train'));
        return redirect()->route('obn.index')->with('success',$output);
    }
}
