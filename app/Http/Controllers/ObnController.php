<?php

namespace App\Http\Controllers;

use App\Models\Obn;
use App\Models\Train;
use Illuminate\Http\Request;

class ObnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $treni = Obn::select('train')->distinct()->get(); //DISTINCT - rimuove i duplicati. Se hai più righe con lo stesso train, ne prende solo una

        $tabella = [];

        foreach ($treni as $treno) {
            $ap = Obn::where('train', $treno->train)->where('type', 'AP')->get();
            $sw = Obn::where('train', $treno->train)->where('type', 'SW')->get();
            $updated_at = Obn::where('train', $treno->train)
            ->orderBy('updated_at', 'asc') // Ordina per updated_at in modo crescente
            ->value('updated_at'); // Ottieni solo il valore della colonna 'updated_at';

            $tabella[] = [
                'train' => $treno->train,
                'ap' => $ap,
                'sw' => $sw,
                'updated_at' => $updated_at,
            ];
        }

        // $obnsol = ['32', '37', '38'];
        // $trains = Obn::where('train', $obnsol)->get();
        return view('pages.obn.index_obn', compact('tabella'));
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
    public function show(Request $train)
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
}
