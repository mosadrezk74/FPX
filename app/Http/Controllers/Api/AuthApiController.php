<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Trait\GeneralTrait;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    use GeneralTrait;

    private function validateLogin(Request $request)
    {
        $rules = [
            "email" => "required|email",
            "password" => "required|string|min:6"
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
    }

    public function login_coach(Request $request)
    {
        try {

            $validationError = $this->validateLogin($request);
            if ($validationError) {
                return $validationError;
            }
            $login = $request->only(['email', 'password']);
            $token = Auth::guard('coach-api')->attempt($login);
            if (!$token) {
                return $this->returnError('E001', 'بيانات الدخول غير صحيحة');
            }
            $coach = Auth::guard('coach-api')->user();
            $coachData = [
                'id' => $coach->id,
                'name_ar' => $coach->name_ar,
                'name_en' => $coach->name_en,
                'photo' => $coach->photo,
                'email' => $coach->email,
                'club' => $coach->club,
                'country' => $coach->country,
                'created_at' => $coach->created_at,
                'updated_at' => $coach->updated_at,
                'token' => $token
            ];
            return $this->returnData('coach', $coachData, 'تم تسجيل الدخول بنجاح');
        } catch (\Exception $e) {
        }
    }

    public function login_player(Request $request)
    {
        try {
            $validationError = $this->validateLogin($request);
            if ($validationError) return $validationError;

            $login = $request->only(['email', 'password']);
            $token = Auth::guard('player-api')->attempt($login);

            if (!$token) {
                return $this->returnError('E001', 'بيانات الدخول غير صحيحة');
            }

            $player = Auth::guard('player-api')->user();
            $playerData = [
                'id' => $player->id,
                'name_ar' => $player->name_ar,
                'name_en' => $player->name_en,
                'photo' => $player->photo,
                'position' => $player->position,
                'country' => $player->country,
                'stat' => $player->stat,
                'club' => $player->club,
                'email' => $player->email,
                'created_at' => $player->created_at,
                'updated_at' => $player->updated_at,
            ];
            $playerData['api_token'] = $token;

            return $this->returnData('player', $playerData);
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }



    public function login_admin(Request $request)
    {
        try {
            $validationError = $this->validateLogin($request);
            if ($validationError) return $validationError;

            $login = $request->only(['email', 'password']);
            $token = Auth::guard('admin-api')->attempt($login);

            if (!$token)
                return $this->returnError('E001', 'بيانات الدخول غير صحيحة');

            $user = Auth::guard('admin-api')->user();
            $user->api_token = $token;
            return $this->returnData('user', $user);
        } catch (\Exception $ex) {
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'status' => true,
            'message' => 'تم تسجيل المستخدم بنجاح',
            'data' => $user,
            'token' => $token,
        ]);
    }

    public function login_user(Request $request)
    {
        $login = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($login)) {
            return response()->json(['status' => false, 'message' => 'Email & password does not match with our record.'], 401);
        }

        return response()->json([
            'status' => true,
            'message' => 'User logged in successfully',
            'data' => Auth::user(),
            'token' => $token,
        ], 200);
    }

    public function logout(Request $request)
    {
        $token = $request->header('Authorization');
        if ($token) {
            try {
                JWTAuth::setToken($token)->invalidate();
                return $this->returnSuccessMessage('Logged out successfully');
            } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                return $this->returnError('', 'Something went wrong');
            }
        } else {
            return $this->returnError('', 'Token not provided');
        }
    }


    public function login(Request $request)
    {
        $login = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($login)) {
            return response()->json(['status' => false, 'message' => 'Email & password does not match with our record.'], 401);
        }

        return response()->json([
            'status' => true,
            'message' => 'User logged in successfully',
            'token' => $token,
        ], 200);
    }





    // public function login_club(Request $request)
    // {
    //     try {
    //         $validationError = $this->validateLogin($request);
    //         if ($validationError) return $validationError;

    //         $login = $request->only(['email', 'password']);
    //         $token = Auth::guard('club-api')->attempt($login);

    //         if (!$token)
    //             return $this->returnError('E001', 'بيانات الدخول غير صحيحة');

    //         $user = Auth::guard('club-api')->user();
    //         $user->api_token = $token;
    //         return $this->returnData('user', $user);
    //     } catch (\Exception $ex) {
    //         return $this->returnError($ex->getCode(), $ex->getMessage());
    //     }
    // }


}