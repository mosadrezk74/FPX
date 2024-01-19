<?php

namespace App\Providers;

use App\Models\Club;
use App\Models\Coach;
use App\Models\Player;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;
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
        $notifications = \App\Models\Notification::all();
        view()->share('notifications',$notifications);
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








    }
}
