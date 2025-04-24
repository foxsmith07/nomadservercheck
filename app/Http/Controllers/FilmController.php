<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(){

        $trains = range(1,26);
        return view('pages.film.index_film',compact('trains'));
    }

    public function search(Request $request){
        $train = $request->input('train'); 
        $search = $request->input('search');
        
        return view('pages.film.play_film', compact('train','search'));
    }

    public function select(){

        // exec('ping -c 3 -w 3 10.131.'.$train.'.1',$output,$ping);
        redirect()->route('film.index');
    }
}
