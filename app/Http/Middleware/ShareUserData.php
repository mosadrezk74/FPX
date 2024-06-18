<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
class ShareUserData
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $userData = Auth::user();
            View::share('userData', $userData);
        }

        return $next($request);
    }

}
