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
    Route::post('/login/coach', [AuthApiController::class, 'login']);
    Route::post('/login/club', [AuthApiController::class, 'login_club']);
     Route::post('/logout', [AuthApiController::class, 'logout']);

});

Route::group(
    [
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','api','change_lang']
    ], function(){

        Route::post('get_clubs_name', [ApiController::class, 'get_clubs_api'])->name('get_clubs_name');

        Route::post('get_club_by_id_api', [ApiController::class, 'get_club_by_id_api'])->name('get_club_by_id_api');
        //############################################################################################################//
        //############################################################################################################//
        Route::post('get_coaches_api', [ApiController::class, 'get_coaches_api'])->name('get_coaches_api');
        Route::post('get_coaches_by_id_api', [ApiController::class, 'get_coaches_by_id_api'])->name('get_coaches_by_id_api');
        //############################################################################################################//
        //############################################################################################################//
        Route::post('get_players_api', [ApiController::class, 'get_players_api'])->name('get_players_api');
        Route::post('get_players_by_id_api', [ApiController::class, 'get_players_by_id_api'])->name('get_players_by_id_api');
    //############################################################################################################//
    //############################################################################################################//
    // General Routes//
        Route::post('/get_current_standing', [ApiController::class, 'get_table']);






});






Route::group(
    [
        'middleware' => ['admin_token_check:admin-api', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','api','password_check','change_lang']
    ], function(){

        Route::get('get_clubs_name', [ApiController::class, 'get_clubs_api'])->name('get_clubs_api');

    });


