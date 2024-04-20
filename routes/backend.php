<?php

use App\Http\Controllers\Admin\AnalysisController;
use App\Http\Controllers\Admin\CaochController;
use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\PlayerStatsController;
use App\Http\Controllers\Auth\CoachLoginController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\Dashboard\Admin_Dashboard;
use App\Http\Controllers\Dashboard\Coach_Dashboard;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Player_Dashboard;
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
  #-----------------#############################-------------------------------#
  Route::get('/dashboard/admin/analysis', [AnalysisController::class, 'index'])->name('analysis.index');
  Route::get('/dashboard/admin/analysis/create', [AnalysisController::class, 'create'])->name('analysis.create');
  Route::post('/dashboard/admin/analysis', [AnalysisController::class, 'store'])->name('analysis.store');
  Route::get('/dashboard/admin/analysis/{id}', [AnalysisController::class, 'show'])->name('analysis.show');
  Route::get('/dashboard/admin/analysis/{id}/edit', [AnalysisController::class, 'edit'])->name('analysis.edit');
  Route::put('/dashboard/admin/analysis/{id}', [AnalysisController::class, 'update'])->name('analysis.update');
  Route::delete('/dashboard/admin/analysis/{id}', [AnalysisController::class, 'destroy'])->name('analysis.destroy');
  #-----------------#############################-------------------------------#


    Route::get('dashboard/admin/front_pages',
        [\App\Http\Controllers\PageController::class, 'index'])->name('page.index');




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
        Route::get('dashboard/coach/epl_stats', [Coach_Dashboard::class, 'epl_stats'])->name('coach.epl_stats');
         ##################################################################################################################
        Route::get('/dashboard/coach/filter', [Coach_Dashboard::class, 'filter'])->name('coach.filter');
        ##################################################################################################################
        Route::get('dashboard/coach/club/statistics/{player_id}', [Coach_Dashboard::class, 'stats'])->name('stats.show');
        Route::get('dashboard/coach/club/statistics/print/{player_id}', [Coach_Dashboard::class, 'print'])->name('stats.print');
        Route::get('dashboard/coach/club/statistics/show/{player_id}', [Coach_Dashboard::class, 'show'])->name('stats.show');

        Route::get('dashboard/coach/{id}/edit', [CaochController::class, 'edit'])->name('coach.edit');
        Route::put('dashboard/coach/{id}/update', [CaochController::class, 'update'])->name('coach.update');



    //--------------------------------------------------------------------------------------------------------
        //--------------------------------------------------------------------------------------------------------


        Route::post('ajaxRequest' ,[Coach_Dashboard::class, 'ajaxRequest'] )->name('ajaxRequest');
    //--------------------------------------------------------------------------------------------------------
       //--------------------------------------------------------------------------------------------------------
        Route::get('dashboard/coach/club/statistics/comparison/{player_id}', [Coach_Dashboard::class, 'compare'])->name('compare');
        Route::post('dashboard/coach/club/statistics/comparison/{player_id}', [Coach_Dashboard::class, 'comparePlayers'])->name('compare.players');
        Route::post('dashboard/coach/club/statistics/comparison/{player_id}', [Coach_Dashboard::class, 'comparePlayers'])->name('players.follow');

        Route::get('dashboard/coach/player/club/club_info', [Coach_Dashboard::class, 'club_info'])->name('coach.club_info');

        ##------------------------Report--------------------------##
        ##------------------------Report--------------------------##
        Route::get('dashboard/coach/report',
            [Coach_Dashboard::class, 'createReport'])
            ->middleware('auth:coach')
            ->name('report.index');


        Route::get('dashboard/coach/report/add',
        [Coach_Dashboard::class, 'addReport'])
            ->middleware('auth:coach')
            ->name('report.create');


        Route::post('dashboard/coach/player/club/report/add/store',
        [Coach_Dashboard::class, 'store'])->name('report.store');

    ##------------------------EReport--------------------------##
    ##------------------------EReport--------------------------##






    Route::get('dashboard/coach/player/calendar', [CaochController::class, 'calendar'])->name('coach.calendar');
     //------------------------- End Coach Routes -------------------------------------------
     //------------------------- End Coach Routes -------------------------------------------

    //______________________ Start Player Routes ____________________________________________
        Route::get('dashboard/player', [\App\Http\Controllers\Dashboard\Player_Dashboard::class, 'index'])
        ->middleware(['auth:player'])
        ->name('dashboard.player');

    Route::get('dashboard/analysis', [\App\Http\Controllers\Dashboard\Analysis_Dashboard::class, 'index'])
        ->middleware(['auth:analysis'])
        ->name('dashboard.analysis');


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
#########################################################
#########################################################
    Route::get('dashboard/player/chat_player',
        [\App\Http\Controllers\Dashboard\Player_Dashboard::class,
            'chat_coach'])->name('player.chat_coach');

    Route::get('/chat/send-message',
        [\App\Http\Controllers\Dashboard\Player_Dashboard::class,
            'sendMessage'])->name('chat.send');

    Route::get('dashboard/coach/chat_coach',
        [\App\Http\Controllers\Dashboard\Coach_Dashboard::class,
            'chat_coach'])->name('coach.chat_coach');

    Route::get('/chat/send-message',
        [\App\Http\Controllers\Dashboard\Coach_Dashboard::class,
            'sendMessage'])->name('chat.send');




    #Start Chat Route#

    Route::get('/dashboard/coach/chat',
        [ContactsController::class, 'index'])
        ->middleware('auth:coach')
        ->name('coach.chat')
    ;
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

