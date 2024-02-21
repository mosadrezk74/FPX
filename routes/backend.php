<?php

use App\Http\Controllers\Admin\CaochController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\PlayerStatsController;
use App\Http\Controllers\Dashboard\Admin_Dashboard;
use App\Http\Controllers\Dashboard\Coach_Dashboard;
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

    Route::get('dashboard/admin', [Admin_Dashboard::class, 'index'])
        ->middleware(['auth:admin'])
        ->name('dashboard.admin');
    //-----------------------------------------------------------------------
    //-----------------------------------------------------------------------
    Route::get('dashboard/coach', [\App\Http\Controllers\Dashboard\Coach_Dashboard::class, 'index'])
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
    Route::get('dashboard/admin/club/status/{status}/{id}', [\App\Http\Controllers\Admin\ClubController::class, 'toggleStatus'])
        ->name('club.toggleStatus');


  Route::resource('dashboard/admin/coach', \App\Http\Controllers\Admin\CaochController::class);
    Route::get('/search', SearchController::class);
    Route::get('/get-available-shirt-numbers/{club_id}', [PlayerController::class, 'getAvailableShirtNumbers']);
    Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);
    //--------------------End Admin Routes------------------------------------------------------
    //--------------------End Admin Routes------------------------------------------------------

     //------------------------- Start Coach Routes -------------------------------------------
    //------------------------- Start Coach Routes -------------------------------------------
        Route::get('dashboard/coach/club/statistics', [Coach_Dashboard::class, 'stats'])->name('coach.stats');
        Route::get('dashboard/coach/club/statistics/{player_id}', [Coach_Dashboard::class, 'stats'])->name('stats.show');
        Route::get('dashboard/coach/club/statistics/print/{player_id}', [Coach_Dashboard::class, 'print'])->name('stats.print');
        Route::get('dashboard/coach/club/statistics/show/{player_id}', [Coach_Dashboard::class, 'show'])->name('stats.show');
        //--------------------------------------------------------------------------------------------------------
        //--------------------------------------------------------------------------------------------------------

        Route::post('ajaxRequest' ,[Coach_Dashboard::class, 'ajaxRequest'] )->name('ajaxRequest');
    //--------------------------------------------------------------------------------------------------------
       //--------------------------------------------------------------------------------------------------------
        Route::get('dashboard/coach/club/statistics/comparison/{player_id}', [Coach_Dashboard::class, 'compare'])->name('compare');
        Route::post('dashboard/coach/club/statistics/comparison/{player_id}', [Coach_Dashboard::class, 'comparePlayers'])->name('compare.players');
        Route::post('dashboard/coach/club/statistics/comparison/{player_id}', [Coach_Dashboard::class, 'comparePlayers'])->name('players.follow');

        Route::get('dashboard/coach/player/club/club_info', [Coach_Dashboard::class, 'club_info'])->name('coach.club_info');



        Route::get('dashboard/coach/player/calendar', [CaochController::class, 'calendar'])->name('coach.calendar');
     //------------------------- End Coach Routes -------------------------------------------
     //------------------------- End Coach Routes -------------------------------------------




});

