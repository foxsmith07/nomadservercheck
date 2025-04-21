<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Ssh\Ssh;

class MovieController extends Controller
{
    public function index(){

        $cinema = range(1,26);

        return view('pages.movie.index_movie', compact('cinema'));
    }

    public function search(Request $request){

        $train = $request->input('train');
        $search = $request->input('search');

        // exec('ping -c 3 -w 3 10.131.1.1',$output,$ping); 
        exec('wsl ping -c 3 -w 3 10.131.'.$train.'.1',$output,$ping); //todo WINDOWS

        if ($ping == 0) {
            if (!empty($search)) {
                $movie = Ssh::create('developer','10.131.'.$train.'.1')->execute('ls /media/movies | grep -i '.$search)->getOutput();
                
            } else {
                $movie = Ssh::create('developer','10.131.'.$train.'.1')->execute('ls /media/movies')->getOutput();
            }
            return redirect()->route('movie.play')->with('movies',$movie);

        } else {
            return redirect()->back()->with('unreachable','Box 1 del treno '.$train.' non raggiungilile!!');
        }
        
    }

    public function play(){
        return view('pages.movie.play_movie');
    }
}
