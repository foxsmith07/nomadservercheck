<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;
use Spatie\Ssh\Ssh;

class CmdController extends Controller
{
    public function index(){
        $trains=Train::all();
        $iob=Train::where('tipology','iob')->get();
        $deb10=Train::where('tipology','deb10')->get();

        return view('pages.cmd.index_cmd',compact('trains','iob','deb10'));
    }

    public function run(Request $request){
        $cmd = $request->input('cmd');
        $train = $request->input('train');

        if ($train == 'all' ) {
            $output = 'ALL TRAIN';
        } elseif ($train == 'iob' ) {
            $output = 'IOB';
        } elseif ($train == 'deb10' ) {
            $output = 'DEB 10';
        } else {
            
            $trova = Train::findOrFail($train);

            $output = $trova->tipology;
        }
        $output = Ssh::create('developer','10.131.'.$train.'.1')->execute($cmd)->getOutput();

        return view('pages.cmd.output_cmd', compact('output','cmd'));
        // return redirect()->route('cmd.responde');
    }
}
