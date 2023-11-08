<?php

namespace App\Providers;

use App\Models\Club;
use Illuminate\Support\ServiceProvider;

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
        view()->share('auth', 'My Awesome Website');
        $club_count=Club::all();
        $count=$club_count->count();
        view()->share('count',$count);
    }
}
