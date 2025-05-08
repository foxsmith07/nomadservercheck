<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Siv;
use App\Models\User;
use App\Models\Train;
use App\Models\Services;
use App\Models\Covreport;
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

        return view('welcome',compact('usersCount','servicesCount','sivCount','covCount','users'));
    }

    // public function obncheck()
    // {
    //     return view('pages.obn.index_obn');
    // }



}
