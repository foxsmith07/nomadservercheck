<?php

namespace App\Http\Controllers;

use Spatie\PdfToText\Pdf;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function obncheck(Request $request)
    {
        return view('pages.obnvalidate');
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
