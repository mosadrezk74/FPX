<?php

namespace App\Http\Middleware;

use App\Trait\GeneralTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminTokenCheck
{
    use GeneralTrait;

    public function handle(Request $request, Closure $next)
    {
        $user = null;

        try {
            $user = JWTAuth::setRequest($request)->parseToken()->authenticate();

        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return $this->returnError('001', 'Token is Invalid');
            } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return $this->returnError('002', 'Token is Expired');
            } else {
                return $this->returnError('003', 'Token not found');
            }
        }

        if (!$user) {
            return $this->returnError('004', 'Token is not authenticated');
        }

        return $next($request);
    }
}
