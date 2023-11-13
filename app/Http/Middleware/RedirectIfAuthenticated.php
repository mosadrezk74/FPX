<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{

    public function handle($request, Closure $next){



        if (auth('web') ->check() ){
            return redirect(RouteServiceProvider::HOME);
        }

        if (auth('admin')->check()){
            return redirect(RouteServiceProvider::ADMIN);
        }

        if (auth('player')->check()){
            return redirect(RouteServiceProvider::PLAYER);
        }

        if (auth('coach')->check()){
            return redirect(RouteServiceProvider::COACH);
        }

        if (auth('club')->check()){
            return redirect(RouteServiceProvider::CLUB);
        }


        return $next($request);
    }
}
