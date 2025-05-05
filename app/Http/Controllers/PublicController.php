<?php

namespace App\Http\Controllers;

use App\Models\Covreport;
use App\Models\Services;
use App\Models\Siv;
use App\Models\User;
use Carbon\Carbon;
use Spatie\PdfToText\Pdf;
use Illuminate\Http\Request;

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

        return view('welcome',compact('usersCount','servicesCount','sivCount','covCount','users'));
    }

    public function obncheck()
    {
        return view('pages.obn.index_obn');
    }

    public function store(Request $request)
    {

        $file = $request->file('file');

        $text = (new Pdf())
            ->setPdf($file)
            ->text();

        return back()->with(['text' => $text]);
    }

    public function pdf(){

        return view('pages.pdf');
    }
}
