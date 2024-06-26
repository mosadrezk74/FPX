<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use App\Models\Club;
use App\Models\Coach;
use App\Models\Player;
use App\Models\Standing;
use Illuminate\Support\Carbon;

use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrap();

        view()->share('auth', 'My Awesome Website');
        $club_count=Player::all();
        $count=$club_count->count();
        view()->share('count',$count);
        $players=Player::with('club')->get();
        view()->share('players',$players);
        $now = Carbon::now();
        $dayOfWeekEnglish = $now->isoFormat('dddd');
        Carbon::setLocale('ar');
        $dayOfWeekArabic = $now->isoFormat('dddd');
        view()->share('dayOfWeekEnglish',$dayOfWeekEnglish);
        view()->share('dayOfWeekArabic',$dayOfWeekArabic);
        $currentTime = Carbon::now();
        $time = $currentTime->format('H:i:s');
        view()->share('time',$time);
        $coach = auth()->guard('coach')->user();
        view()->share('coach',$coach);
        $coach_info=Coach::with('club')->get();
        view()->share('coach_info',$coach_info);
        $player=auth()->guard('player')->user();
        view()->share('player',$player);
        $auth = Auth::user();
        view()->share('auth',$auth);



















    }
}
