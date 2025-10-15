<?php

use App\Http\Controllers\CmdController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SivController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\CovreportController;
use App\Http\Controllers\ItaloupgradeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ObnController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TrainController;
use App\Http\Controllers\UserController;
use App\Livewire\Italoupgrade;
use Faker\Guesser\Name;

Route::middleware(['auth'])->group(function(){

    //* WELCOME PAGE - WIDGET
    Route::get('/',[PublicController::class, 'index'])->name('welcome');
    Route::put('/save',[PublicController::class,'save'])->name('welcome.save');
    

    //* SIV REQUEST
    Route::get('/siv-request',[SivController::class, 'index'])->name('siv.index');
    Route::get('/siv-request/create',[SivController::class,'create'])->name('siv.create');
    Route::post('/siv-request/store',[SivController::class,'store'])->name('siv.store');
    Route::delete('siv-request/delete/{siv}',[SivController::class,'destroy'])->name('siv.destroy');
    Route::get('siv-request/edit/{siv}',[SivController::class,'edit'])->name('siv.edit');
    Route::put('siv-request/update/{siv}',[SivController::class,'update'])->name('siv.update');
    

    //* COV REPORT
    Route::get('/cov-report',[CovreportController::class,'index'])->name('cov.index');
    Route::get('/cov-report/creaate', [CovreportController::class,'create'])->name('cov.create');
    Route::post('/cov-report/store',[CovreportController::class,'store'])->name('cov.store');
    Route::get('/cov-report/edit/{cov}',[CovreportController::class,'edit'])->name('cov.edit');
    Route::put('/cov-report/update/{cov}',[CovreportController::class,'update'])->name('cov.update');
    Route::delete('/cov-report/destroy/{cov}',[CovreportController::class,'destroy'])->name('cov.destroy');
    
    
    //* CHIUSURE SERVIZIO
    Route::get('/chiusure-servizio',[ServicesController::class,'index'])->name('servizio.index');
    Route::get('/chiusure-servizio/create',[ServicesController::class,'create'])->name('servizio.create');
    Route::post('/chiusure-servizio/store',[ServicesController::class,'store'])->name('servizio.store');
    Route::get('/chiusura-servizio/show/{service}',[ServicesController::class,'show'])->name('servizio.show');
    Route::delete('/chiusura-servizio/destroy/{service}',[ServicesController::class,'destroy'])->name('servizio.destroy');


    //* ITALO UPGRADE ROADMAP
    Route::get('/italo-upgrade',[ItaloupgradeController::class, 'index'])->name('italoupgrade.index');
    Route::get('/italo-upgrade/create', [ItaloupgradeController::class, 'create'])->name('italoupgrade.create'); 
    Route::post('/italo-upgrade/store',[ItaloupgradeController::class, 'store'])->name('italoupgrade.store');
    Route::get('/italo-upgrade/edit/{item}',[ItaloupgradeController::class, 'edit'])->name('italoupgrade.edit');
    Route::put('/italo-upgrade/update/{item}',[ItaloupgradeController::class, 'update'])->name('italoupgrade.update');
    Route::delete('/italo-updrade/destroy/{item}', [ItaloupgradeController::class, 'destroy'])->name('italoupgrade.destroy');
    
    
    //* TRAIN CONFIGURATOR
    Route::get('/trains',[TrainController::class, 'index'])->name('train.index');
    Route::get('/train/create',[TrainController::class, 'create'])->name('train.create');
    Route::post('/train/store',[TrainController::class, 'store'])->name('train.store');
    Route::get('/train/edit/{train}',[TrainController::class, 'edit'])->name('train.edit');
    Route::put('/train/update/{train}',[TrainController::class, 'update'])->name('train.update');
    Route::delete('/train/delete/{train}', [TrainController::class, 'destroy'])->name('train.destroy');
    
    
    //* OBN TRAIN CHECK
    Route::get('/obn-train/check',[ObnController::class, 'index'])->name('obn.index');
    Route::get('/obn-train/show/{train}',[ObnController::class, 'show'])->name('obn.show');
    Route::get('/obn-train/real-time-check/{train}',[ObnController::class,'rtcheck'])->name('obn.rtcheck'); 
    Route::get('/obn-train/all-check', [ObnController::class, 'allCheck'])->name('obn.allCheck');

    //* CMD ON TRAINS
    Route::get('/cmd-on-trains',[CmdController::class, 'index'])->name('cmd.index');


    //* MOVIE TO SEND 
    // Route::get('/movie-to-send',[MovieController::class, 'index'])->name('movie.index');
    // Route::post('/movie-to-send/search', [MovieController::class, 'search'])->name('movie.search');
    // Route::post('/movie-to-send/play',[MovieController::class, 'play'])->name('movie.play');

    Route::get('movie-to-send',[MovieController::class, 'index'])->name('movie.index');


    //* USERS
    Route::get('/users',[UserController::class, 'index'])->name('user.index')->middleware('admin');
    Route::get('/profile/{user}',[UserController::class, 'edit'])->name('user.edit');
    Route::get('/create-user',[UserController::class, 'create'])->name('user.create')->middleware('admin');
    Route::post('/store-user',[UserController::class, 'store'])->name('user.store')->middleware('admin');
    Route::delete('/user/delete/{user}',[UserController::class,'destroy'])->name('user.destroy')->middleware('admin');
    Route::put('/user/{user}/switch-to/',[UserController::class, 'update'])->name('user.update')->middleware('admin');


    //* STOCK MANAGEMENT
    Route::get('/stock-management',[StockController::class,'index'])->name('stock.index');
    Route::get('/stock-management/{item}', [StockController::class,'show'])->name('stock.show');
    Route::get('/stock-management/edit/{item}', [StockController::class, 'edit'])->name('stock.edit');

});