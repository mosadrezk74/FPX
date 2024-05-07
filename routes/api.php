<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\PlayerApiController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ClubApiController;
use App\Http\Controllers\Dashboard\Admin_Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//AuthApiController
Route::group([
    'middleware' => ['api'],
    'prefix' => 'auth'

], function () {
    ## --- Start Auth Api --- ##
    Route::post('/login/coach', [AuthApiController::class, 'login_coach']);
    Route::post('/login/club', [AuthApiController::class, 'login_club']);
    Route::post('/login/player', [AuthApiController::class, 'login_player']);
    Route::post('/login/admin', [AuthApiController::class, 'login_admin']);
    Route::post('/login/user', [AuthApiController::class, 'login_user']);







    ## --- LOGOUT Api --- ##
    Route::post('/logout', [AuthApiController::class, 'logout']);
    ## --- LOGOUT Api --- ##
    ## --- End Auth Api --- ##

});

Route::group(
    [
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','api']
    ], function(){
        //############################################################################################################//
        ## Start Clubs Name##
        Route::post('get_clubs_name', [ApiController::class, 'get_clubs_api'])->name('get_clubs_name');
        Route::post('get_club_by_id_api', [ApiController::class, 'get_club_by_id_api'])->name('get_club_by_id_api');
        ## End Clubs Name##
        //############################################################################################################//
        ## Start Coaches Name##
        Route::post('get_coaches_api', [ApiController::class, 'get_coaches_api'])->name('get_coaches_api');
        Route::post('get_coaches_by_id_api', [ApiController::class, 'get_coaches_by_id_api'])->name('get_coaches_by_id_api');
        ## End Coaches Name##
        //#############################################################################################################//
        ## Start Players Name##
        Route::post('get_players_api', [ApiController::class, 'get_players_api'])->name('get_players_api');
        Route::post('get_players_by_id_api', [ApiController::class, 'get_players_by_id_api'])->name('get_players_by_id_api');
        ####################
        Route::post('get_all_stats', [ApiController::class, 'get_all_stats'])->name('get_all_stats');
        Route::post('get_stats_by_id_api', [ApiController::class, 'get_stats_by_id_api'])->name('get_stats_by_id_api');
        ####################
        ## End Players Name##
        //############################################################################################################//
        ## شويه apis متنوعه ##
        Route::post('/get_current_standing', [ApiController::class, 'get_table']);
        Route::post('/get_theTop_player_score', [ApiController::class, 'top_player']);
        Route::post('/get_theTop_player_assist', [ApiController::class, 'top_assist']);
        Route::post('/get_theTop_player_Rate', [ApiController::class, 'top_rating']);
        Route::post('/top_xg', [ApiController::class, 'top_xg']);
        Route::post('/top_xa', [ApiController::class, 'top_xa']);
        Route::post('/goals_assists', [ApiController::class, 'xg_xa']);
        Route::post('/top_key_pass', [ApiController::class, 'top_key_pass']);
        ## شويه apis متنوعه ##
        //############################################################################################################//





});

