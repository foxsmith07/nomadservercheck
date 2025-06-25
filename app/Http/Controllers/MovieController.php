<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Train;
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

        exec('ping -c 3 -W 3 10.131.'.$train.'.1',$output,$ping); 
        // exec('wsl ping -c 3 -w 3 10.131.'.$train.'.1',$output,$ping); //todo WINDOWS

        if ($ping == 0) {
            if (!empty($search)) {
                try {
                    //code...
                    $movies = Ssh::create('developer','10.131.'.$train.'.1')->setTimeout(5)->execute('ls /media/movies | grep -i '.$search)->getOutput();
                } catch (\Exception $e) {
                    $movies = $e;
                }
                
            } else {
                try {
                    //code...
                    $movies = Ssh::create('developer','10.131.'.$train.'.1')->setTimeout(5)->execute('ls /media/movies')->getOutput();
                } catch (\Exception $e) {
                    $movies = $e;
                }
            }
            // return redirect()->route('movie.select',compact('train'))->with('movies',$movie);
            return view('pages.movie.play_movie',compact('movies','train'));

        } else {
            return redirect()->back()->with('unreachable','Box 1 del treno '.$train.' non raggiungilile!!');
        }
        
    }


    public function play(Request $request){

        $train = $request->input('train');
        $film = $request->input('film');
        $cmd="curl -s --show-error http://localhost:2323/cinema/server/play/";

        try {
            $output = Ssh::create('developer','10.131.'.$train.'.1 ')->execute($cmd.$film)->getOutput();
        } catch (\Exception $e) {
            $output=$e;
        }
        
        return redirect()->route('movie.index')->with('output',$output);
    }
}
