<?php

use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SearchController;
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

    //-----------------------------------------------------------------------
    Route::get('/dashboard/user', function () {
        return view('Dashboard.User.dashboard');
    })->middleware(['auth'])->name('dashboard.user');
    //-----------------------------------------------------------------------
    //-----------------------------------------------------------------------
    Route::get('/dashboard/admin', function () {
        return view('Dashboard.Admin.dashboard');
    })->middleware(['auth:admin'])->name('dashboard.admin');
    //-----------------------------------------------------------------------
    //-----------------------------------------------------------------------
    Route::get('/dashboard/caoch', function () {
        return view('Dashboard.Coach_Dashboard.dashboard');
    })->middleware(['auth:coach'])->name('dashboard.caoch');
    //-----------------------------------------------------------------------
    //-----------------------------------------------------------------------
    Route::get('/dashboard/player', function () {
        return view('Dashboard.Player_Dashboard.dashboard');
    })->middleware(['auth:player'])->name('dashboard.player');
    //-----------------------------------------------------------------------
    //-----------------------------------------------------------------------
    Route::get('/dashboard/club', function () {
        return view('Dashboard.Club_Dashboard.dashboard');
    })->middleware(['auth:club'])->name('dashboard.club');
    //-----------------------------------------------------------------------
    //-----------------------------------------------------------------------


    //--------------------Start Admin Routes---------------------------------------------------
  Route::resource('dashboard/admin/player', PlayerController::class);
  Route::resource('dashboard/admin/club', \App\Http\Controllers\Admin\ClubController::class);
  Route::resource('dashboard/admin/coach', \App\Http\Controllers\Admin\CaochController::class);
    Route::get('/search', SearchController::class);
//    Route::get('/get-available-shirt-numbers/{club_id}', \App\Http\Controllers\Admin\PlayerController::class . 'getAvailableShirtNumbers');
    Route::get('/get-available-shirt-numbers/{club_id}', [PlayerController::class, 'getAvailableShirtNumbers']);



    //--------------------End Admin Routes------------------------------------------------------



    Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);



});

