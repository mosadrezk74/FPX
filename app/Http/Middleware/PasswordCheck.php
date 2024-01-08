<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasswordCheck
{

    public function handle(Request $request, Closure $next): Response
    {
        if( $request->api_password !== env('API_PASSWORD','fpx@12345')){
            return response()->json(['message' => 'Unauthenticated./ مش مسجل دخول'], 401);
        }
        return $next($request);
    }
}
