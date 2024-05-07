<?php

use App\Http\Controllers\FrontContoller;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {
##################################################################################
    Route::get('/', [\App\Http\Controllers\FrontContoller::class, 'index'])
        ->name('index');
##################################################################################
    Route::get('/player', [\App\Http\Controllers\FrontContoller::class, 'player'])
        ->name('player');
##################################################################################
    Route::get('/contact', [\App\Http\Controllers\FrontContoller::class, 'contact'])
        ->name('contact');


    Route::post('/contact', [\App\Http\Controllers\FrontContoller::class, 'contact_store'])
        ->name('contact.store');

##################################################################################
    Route::get('/about', [\App\Http\Controllers\FrontContoller::class, 'about'])
        ->name('about');
##################################################################################
    Route::get('/compare', [FrontContoller::class, 'compare'])->name('compare');
##################################################################################
    Route::post('/comparison', [FrontContoller::class, 'comparison'])->name('comparison');
##################################################################################

    Route::post('/join', [FrontContoller::class, 'join_store'])->name('join.store');

    Route::get('/join', [\App\Http\Controllers\FrontContoller::class, 'join'])
        ->name('join');

##################################################################################
    Route::get('/discover', [\App\Http\Controllers\FrontContoller::class, 'discover'])
        ->name('discover');
##################################################################################
    Route::get('/rating', [\App\Http\Controllers\FrontContoller::class, 'rating'])
        ->name('rating');
    ##################################################################################
    Route::get('/scouting', [\App\Http\Controllers\FrontContoller::class, 'scouting'])
        ->name('scouting');
##################################################################################
    Route::get('/send', [\App\Http\Controllers\FrontContoller::class, 'send'])
        ->name('send');


    ##################################################################################
    Route::post('/send', [\App\Http\Controllers\FrontContoller::class, 'send_store'])
        ->name('send.store');






    ##################################################################################
    Route::get('/signup', [\App\Http\Controllers\FrontContoller::class, 'signup'])
        ->name('signup');
##################################################################################
    Route::get('/topRated', [\App\Http\Controllers\FrontContoller::class, 'topRated'])
        ->name('topRated');
##################################################################################

});

























Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
