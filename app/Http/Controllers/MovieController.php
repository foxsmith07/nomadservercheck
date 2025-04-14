<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){

        $cinema = range(1,26);
        return view('pages.movie.index_movie', compact('cinema'));
    }
}
