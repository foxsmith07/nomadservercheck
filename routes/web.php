<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PublicController::class, 'index'])->name('index');

Route::get('/obn-validate',[PublicController::class, 'obncheck'])->name('obn.check');
Route::post('/file/submit',[PublicController::class, 'store'])->name('file.submit');

Route::get('/pdf-reader',[PublicController::class, 'pdf'])->name('pdf');