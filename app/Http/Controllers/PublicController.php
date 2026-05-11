<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Siv;
use App\Models\User;
use App\Models\Train;
use App\Models\Services;
use App\Models\Covreport;
use App\Models\Lavagna;
use Spatie\PdfToText\Pdf;
use Illuminate\Http\Request;
use Spatie\Ssh\Ssh;

class PublicController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $usersCount = User::all()->count();
        $servicesCount = Services::all()->count();
        $covCount = Covreport::whereMonth('created_at', $now->month)->count();
        $sivCount = Siv::all()->count();
        $users = User::all();
        $iobTrains = Train::where('tipology','iob')->count();

        $percentuale = round((100 * $iobTrains) / 51);

        $lavagna = Lavagna::first();

        return view('welcome',compact('usersCount','servicesCount','sivCount','covCount','users','lavagna','iobTrains','percentuale'));
    }

    public function save(Request $request){

        $contenuto = $request->input('content');

        $lavagna = Lavagna::first();

        if($lavagna){

            $lavagna->update([
                'content'=> $contenuto,
            ]);
        } else {
            Lavagna::create([
                'content' => $contenuto
            ]);
        }

        return redirect()->back()->with('success', 'Lavagna Aggiornata!!');

    }


}
