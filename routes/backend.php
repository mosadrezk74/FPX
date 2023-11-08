<?php

use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');


    Route::get('/dashboard/user', function () {
        return view('Dashboard.User.dashboard');
    })->middleware(['auth'])->name('dashboard.user');

    Route::get('/dashboard/admin', function () {
        return view('Dashboard.Admin.dashboard');
    })->middleware(['auth:admin'])->name('dashboard.admin');

    //////////////////////////////  Start Player Route         ///////////////////////////////////////
//    Route::get('/dashboard/admin/player', [PlayerController::class, 'index'])->name('player.index');
//    Route::get('/dashboard/admin/player/create', [PlayerController::class, 'create'])->name('player.create');
//    Route::post('/dashboard/admin/player/store', [PlayerController::class, 'store'])->name('player.store');
//    Route::get('/dashboard/admin/player/{id}', [PlayerController::class, 'show'])->name('player.show');
//    Route::get('/dashboard/admin/player/{id}/edit', [PlayerController::class, 'edit'])->name('player.edit');
//    Route::put('/dashboard/admin/player/{id}', [PlayerController::class, 'update'])->name('player.update');
//    Route::delete('/dashboard/admin/player/{id}', [PlayerController::class, 'destroy'])->name('player.destroy');

  Route::resource('dashboard/admin/player', PlayerController::class);
  Route::resource('dashboard/admin/club', \App\Http\Controllers\Admin\ClubController::class);

    //////////////////////////  End Player Route    ///////////////////////////////////////

});

