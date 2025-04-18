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

    public function play(Request $request){

        $train = $request->input('train');
        $search = $request->input('search');

        $ping = exec('ping -c 3 -w 3 10.131.1.1',$output,$result);

        if ($result == 0) {
            if (!empty($search)) {
                $movie = Ssh::create('developer','10.131.'.$train.'.1')->execute('ls /media/movies | grep -i '.$search)->getOutput();
                
            } else {
                $movie = Ssh::create('developer','10.131.'.$train.'.1')->execute('ls /media/movies')->getOutput();
            }
            return redirect()->back()->with('movies',$movie);

        } else {
            return redirect()->back()->with('unreachable','Box 1 del treno '.$train.' non raggiungilile!!');
        }
        
        // dd($ping);

    }
}
