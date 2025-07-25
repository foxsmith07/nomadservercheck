<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Ssh\Ssh;

class CmdController extends Controller
{
    public function index()
    {
        return view('pages.cmd.index_cmd2');
    }

}
