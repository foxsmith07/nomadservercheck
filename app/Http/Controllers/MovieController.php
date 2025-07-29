<?php

namespace App\Http\Controllers;

use Exception;
use Spatie\Ssh\Ssh;
use App\Models\Train;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{

    public function index() {
        return view('pages.movie.index');
    }
}
