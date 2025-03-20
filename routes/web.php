<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\SivController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PublicController::class, 'index'])->name('index');

//* SIV REQUEST
Route::get('/siv-request',[SivController::class, 'index'])->name('siv.index');
Route::get('/siv-request/create',[SivController::class,'create'])->name('siv.create');
Route::post('/siv-request/store',[SivController::class,'store'])->name('siv.store');
Route::delete('siv-request/delete/{siv}',[SivController::class,'destroy'])->name('siv.destroy');
Route::get('siv-request/edit/{siv}',[SivController::class,'edit'])->name('siv.edit');
Route::put('siv-request/update/{siv}',[SivController::class,'update'])->name('siv.update');


Route::get('/obn-validate',[PublicController::class, 'obncheck'])->name('obn.check');
Route::post('/file/submit',[PublicController::class, 'store'])->name('file.submit');

Route::get('/pdf-reader',[PublicController::class, 'pdf'])->name('pdf');