<?php

use App\Http\Controllers\Admin\CaochController;
use App\Http\Controllers\Admin\ClubController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\PlayerStatsController;
use App\Http\Controllers\Auth\CoachLoginController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\Dashboard\Admin_Dashboard;
use App\Http\Controllers\Dashboard\Coach_Dashboard;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Player_Dashboard;
use App\Http\Controllers\PageController;
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
    #-----------------#############################-------------------------------

    Route::get('dashboard/admin/player_stats', [PlayerStatsController::class, 'index'])->name('player_stats.index');
    Route::get('dashboard/admin/player_stats/add_player_stats', [PlayerStatsController::class, 'create'])->name('player_stats.create');
    Route::get('dashboard/admin/player_stats/add_player_stats/store', [PlayerStatsController::class, 'store'])->name('player_stats.store');
    Route::get('/get-players/{clubId}', [PlayerStatsController::class, 'getPlayers'])->name('getPlayers');
    Route::get('/get-available-shirt-numbers/{club_id}', [PlayerController::class, 'getAvailableShirtNumbers']);
    //-------------------------------------------------------------------------
    //-------------------------------------------------------------------------
    Route::resource('dashboard/admin/club', \App\Http\Controllers\Admin\ClubController::class);

    Route::get('dashboard/admin/club/status/{status}/{id}', [\App\Http\Controllers\Admin\ClubController::class, 'toggleStatus'])
        ->name('club.toggleStatus');

    Route::get('dashboard/dashboard/admin/join_front/{status}/{id}', [\App\Http\Controllers\PageController::class, 'toggleStatus'])
        ->name('join.toggleStatus');

    Route::get('dashboard/dashboard/admin/contact_front/{status}/{id}', [\App\Http\Controllers\PageController::class, 'toggleStatus_contact'])
        ->name('contact.toggleStatus');
    Route::resource('dashboard/admin/coach', \App\Http\Controllers\Admin\CaochController::class);
    //--------------------End Admin Routes------------------------------------------------------
    //--------------------End Admin Routes------------------------------------------------------

    //------------------------- Start Coach Routes -------------------------------------------
    //------------------------- Start Coach Routes -------------------------------------------
    Route::get('dashboard/coach/club/statistics', [Coach_Dashboard::class, 'stats'])->name('coach.stats');
    Route::get('dashboard/coach/epl_stats', [Coach_Dashboard::class, 'epl_stats'])->name('coach.epl_stats');
    Route::get('/dashboard/coach/filter', [Coach_Dashboard::class, 'filter'])->name('coach.filter');
    Route::get('dashboard/coach/club/statistics/{player_id}', [Coach_Dashboard::class, 'stats'])->name('stats.show');
    Route::get('dashboard/coach/club/statistics/print/{player_id}', [Coach_Dashboard::class, 'print'])->name('stats.print');
    Route::get('dashboard/coach/club/statistics/show/{player_id}', [Coach_Dashboard::class, 'show'])->name('stats.show');
    Route::get('dashboard/coach/{id}/edit', [CaochController::class, 'edit'])->name('coach.edit');
    Route::put('dashboard/coach/{id}/update', [CaochController::class, 'update'])->name('coach.update');
    Route::get('dashboard/coach/compare', [Coach_Dashboard::class, 'compare'])->name('back.compare');
    Route::post('dashboard/coach/comparison', [Coach_Dashboard::class, 'comparePlayers'])->name('back.comparison');
    Route::get('dashboard/coach/club_info', [Coach_Dashboard::class, 'club_info'])->name('coach.club_info');
    //--------------------------------------------------------------------------------------------------------

    ##------------------------Report--------------------------##
    ##------------------------Report--------------------------##
    Route::get('dashboard/coach/task',
        [Coach_Dashboard::class, 'createReport'])
        ->middleware('auth:coach')
        ->name('report.index');



    Route::get('dashboard/player/task',
        [Player_Dashboard::class, 'task'])
        ->middleware('auth:player')
        ->name('player.report');




    Route::get('dashboard/coach/report/add',
        [Coach_Dashboard::class, 'addReport'])
        ->middleware('auth:coach')
        ->name('report.create');


    Route::post('dashboard/coach/report/add/store',
        [Coach_Dashboard::class, 'store'])->name('report.store');

    ##------------------------EReport--------------------------##
    ##------------------------EReport--------------------------##

    Route::get('dashboard/coach/calendar', [CaochController::class, 'calendar'])->name('coach.calendar');
    //------------------------- End Coach Routes -------------------------------------------
    //------------------------- End Coach Routes -------------------------------------------

    //______________________ Start Player Routes ____________________________________________
    Route::get('dashboard/player', [\App\Http\Controllers\Dashboard\Player_Dashboard::class, 'index'])
        ->middleware(['auth:player'])
        ->name('dashboard.player');


    Route::get('dashboard/player/stats',
        [\App\Http\Controllers\Dashboard\Player_Dashboard::class,
            'stats'])->name('player.stats');


    Route::get('dashboard/player/matches_rating',
        [\App\Http\Controllers\Dashboard\Player_Dashboard::class,
            'rating'])->name('player.match_rating');


    Route::get('dashboard/player/compare',
        [\App\Http\Controllers\Dashboard\Player_Dashboard::class,
            'compare'])->name('player.compare');

    Route::get('dashboard/player/coach_discussion',
        [\App\Http\Controllers\Dashboard\Player_Dashboard::class,
            'coach_discussion'])->name('player.coach');


    Route::get('dashboard/player/analysis_discussion',
        [\App\Http\Controllers\Dashboard\Player_Dashboard::class,
            'analysis_discussion'])->name('player.analysis');


    Route::get('dashboard/player/develop',
        [\App\Http\Controllers\Dashboard\Player_Dashboard::class,
            'develop'])->name('player.develop');



    Route::get('dashboard/player/club_info',
        [\App\Http\Controllers\Dashboard\Player_Dashboard::class,
            'club_info'])->name('player.club_info');


    Route::get('dashboard/player/epl_stats',
        [\App\Http\Controllers\Dashboard\Player_Dashboard::class,
            'epl_stats'])->name('player.epl_stats');

    Route::get('dashboard/player/compare', [Player_Dashboard::class, 'compare'])->name('player.compare');

    Route::post('/dashboard/player/comparison',
        [Player_Dashboard::class, 'comparePlayers'])->name('comparePlayers');




#########################################################
    #Start Chat Route#
    Route::get('/dashboard/coach/chat',
        [ContactsController::class, 'index'])
        ->middleware('auth:coach')
        ->name('coach.chat');
    ###########################################################
    Route::get('/dashboard/player/chat',
        [ContactsController::class, 'index_player'])
        ->middleware('auth:player')
        ->name('player.chat')
    ;
    ###########################################################
    Route::get('/checkConvo/{recieverId}',
        [ContactsController::class, 'check'])->middleware('auth:coach');
    ###########################################################
    Route::post('/sendMessage',
        [ContactsController::class, 'store'])->middleware('auth:coach')
        ->name('sendMessage');
    ###########################################################

    Route::get('/loadMessage/{reciever}/{sender}',
        [ContactsController::class, 'load'])->middleware('auth:coach');
    Route::get('/retrieveMessages/{reciever}/{sender}/{lastMsgId}',
        [ContactsController::class, 'retrieveNew'])->middleware('auth:coach');
    #End Chat Route#
});
























































