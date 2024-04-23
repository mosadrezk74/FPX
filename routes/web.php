<?php

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
        ->name('front.index');
##################################################################################
    Route::get('/player', [\App\Http\Controllers\FrontContoller::class, 'player'])
        ->name('front.player');
##################################################################################
    Route::get('/contact', [\App\Http\Controllers\FrontContoller::class, 'contact'])
        ->name('front.contact');

});

























Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
