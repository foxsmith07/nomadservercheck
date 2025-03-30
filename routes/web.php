<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SivController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CovreportController;
use App\Http\Controllers\TrainController;

Route::get('/',[PublicController::class, 'index'])->name('index');

//* SIV REQUEST
Route::get('/siv-request',[SivController::class, 'index'])->name('siv.index');
Route::get('/siv-request/create',[SivController::class,'create'])->name('siv.create');
Route::post('/siv-request/store',[SivController::class,'store'])->name('siv.store');
Route::delete('siv-request/delete/{siv}',[SivController::class,'destroy'])->name('siv.destroy');
Route::get('siv-request/edit/{siv}',[SivController::class,'edit'])->name('siv.edit');
Route::put('siv-request/update/{siv}',[SivController::class,'update'])->name('siv.update');

//* COV REPORT
Route::get('/cov-report',[CovreportController::class,'index'])->name('cov.index');
Route::get('cov-report/creaate', [CovreportController::class,'create'])->name('cov.create');
Route::post('cov-report/store',[CovreportController::class,'store'])->name('cov.store');

//* CHIUSURE SERVIZIO
Route::get('/chiusure-servizio',[ServicesController::class,'index'])->name('servizio.index');


//* Train configuration
Route::get('/trains',[TrainController::class, 'index'])->name('train.index');
Route::get('/train/create',[TrainController::class, 'create'])->name('train.create');
Route::post('/train/store',[TrainController::class, 'store'])->name('train.store');
Route::get('/train/edit/{train}',[TrainController::class, 'edit'])->name('train.edit');
Route::put('/train/update/{train}',[TrainController::class, 'update'])->name('train.update');
Route::delete('/train/delete/{train}', [TrainController::class, 'destroy'])->name('train.destroy');



Route::get('/obn-validate',[PublicController::class, 'obncheck'])->name('obn.check');
Route::post('/file/submit',[PublicController::class, 'store'])->name('file.submit');

Route::get('/pdf-reader',[PublicController::class, 'pdf'])->name('pdf');