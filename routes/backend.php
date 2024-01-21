<?php

use App\Http\Controllers\Admin\CaochController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\PlayerStatsController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\Coach_Dashboard;
use App\Http\Controllers\Dashboard\Admin_Dashboard;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SearchController;
use App\Livewire\PlayerStats;
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

           Route::get('/test', function () {
        return view('Dashboard.pages.dropdown');
    });

    //-----------------------------------------------------------------------
    Route::get('/dashboard/user', function () {
        return view('Dashboard.User.dashboard');
    })->middleware(['auth'])->name('dashboard.user');
    //-----------------------------------------------------------------------
    //-----------------------------------------------------------------------

    Route::get('dashboard/admin', [Admin_Dashboard::class, 'index'])
        ->middleware(['auth:admin'])
        ->name('dashboard.admin');
    //-----------------------------------------------------------------------
    //-----------------------------------------------------------------------
    Route::get('dashboard/coach', [\App\Http\Controllers\Coach_Dashboard::class, 'index'])
        ->middleware(['auth:coach'])
        ->name('dashboard.coach');
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



  //-------------------------------------------------------------------------
  //-------------------------------------------------------------------------
  Route::get('dashboard/admin/player_stats', [PlayerStatsController::class, 'index'])->name('player_stats.index');
  Route::get('dashboard/admin/player_stats/add_player_stats', [PlayerStatsController::class, 'create'])->name('player_stats.create');
  Route::get('dashboard/admin/player_stats/add_player_stats/store', [PlayerStatsController::class, 'store'])->name('player_stats.store');
  Route::get('/get-players/{clubId}', [PlayerStatsController::class, 'getPlayers'])->name('getPlayers');

    //-------------------------------------------------------------------------
    //-------------------------------------------------------------------------
     Route::resource('dashboard/admin/club', \App\Http\Controllers\Admin\ClubController::class);
  Route::resource('dashboard/admin/coach', \App\Http\Controllers\Admin\CaochController::class);
    Route::get('/search', SearchController::class);
//    Route::get('/get-available-shirt-numbers/{club_id}', \App\Http\Controllers\Admin\PlayerController::class . 'getAvailableShirtNumbers');
    Route::get('/get-available-shirt-numbers/{club_id}', [PlayerController::class, 'getAvailableShirtNumbers']);
    Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);
    //--------------------End Admin Routes------------------------------------------------------
    //------------------------- Start Coach Routes -------------------------------------------
        Route::get('dashboard/coach/player/stats', [CaochController::class, 'stats'])->name('coach.stats');
        Route::get('dashboard/coach/player/contact', [CaochController::class, 'contact'])->name('coach.contact');
     //------------------------- End Coach Routes -------------------------------------------
     //------------------------- End Coach Routes -------------------------------------------




});

