<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use App\Trait\GeneralTrait;
use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthApiController extends Controller
{
    Use GeneralTrait;

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }



    public function login(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

         if (!Auth::guard('coach')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

         $token = Auth::guard('coach')->user()->createToken('Coach Token')->accessToken;

        return response()->json(['token' => $token]);
    }



    public function login_club(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

         if (!Auth::guard('club')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

         $token = Auth::guard('club')->user()->createToken('Club Token')->accessToken;

        return response()->json(['token' => $token]);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }







    protected function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 120,
            'user' => auth()->user()
        ]);
    }



}
