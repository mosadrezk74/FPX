<?php

use App\Http\Controllers\Api\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//AuthApiController
Route::group([
    'middleware' => ['api'],
    'prefix' => 'auth'

], function () {
    Route::post('/login', [AuthApiController::class, 'login']);
    Route::post('/register', [AuthApiController::class, 'register']);
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::post('/refresh', [AuthApiController::class, 'refresh']);
    Route::get('/user-profile', [AuthApiController::class, 'userProfile']);
});

Route::group(
    [
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','api','password_check','change_lang']
    ], function(){

        Route::post('get_clubs_name', [\App\Http\Controllers\Admin\ClubController::class, 'get_clubs_api'])->name('get_clubs_name');
        Route::post('get_club_by_id_api', [\App\Http\Controllers\Admin\ClubController::class, 'get_club_by_id_api'])->name('get_club_by_id_api');

    });



Route::group(
    [
        'middleware' => ['admin_token_check:admin-api', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','api','password_check','change_lang']
    ], function(){

        Route::get('get_clubs_name', [\App\Http\Controllers\Admin\ClubController::class, 'get_clubs_api'])->name('get_clubs_api');

    });


