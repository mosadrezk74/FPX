<?php

use App\Http\Controllers\FrontContoller;
use App\Http\Controllers\PageController;
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
    Route::get('/compare', [FrontContoller::class, 'compare'])->name('compare_front');
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
    Route::get('/clubs', [\App\Http\Controllers\FrontContoller::class, 'clubs'])
        ->name('clubs');
##################################################################################
###################################################################################
    Route::get('/signup', [\App\Http\Controllers\FrontContoller::class, 'signup'])
        ->name('signup');
##################################################################################
    Route::get('/topRated', [\App\Http\Controllers\FrontContoller::class, 'topRated'])
        ->name('topRated');
##################################################################################
#----------------------------Start Backend Routes-------------------------------------
##################################################################################
    Route::get('dashboard/admin/join_front',
        [\App\Http\Controllers\PageController::class, 'join'])->name('front.join');

    Route::delete('/dashboard/admin/join_front/{id}', [PageController::class, 'destroy'])->name('join.destroy');

    Route::get('dashboard/admin/contact_front',
        [\App\Http\Controllers\PageController::class, 'contact'])->name('front.contact');
##################################################################################
    Route::get('/contact/delete/{id}', [PageController::class, 'contact_delete'])->name('contact_delete');
    Route::get('/join/delete/{id}', [PageController::class, 'join_delete'])->name('join_delete');
    Route::get('/send/delete/{id}', [PageController::class, 'send_delete'])->name('send_delete');
    Route::get('dashboard/admin/users', [PageController::class, 'fetch_user'])->name('fetch_user');
    Route::get('/user/delete/{id}', [PageController::class, 'user_delete'])->name('user_delete');

    ##################################################################################


    Route::get('dashboard/admin/send_front',
        [\App\Http\Controllers\PageController::class, 'send'])->name('front.send');
##################################################################################
##################################################################################




});

























Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
