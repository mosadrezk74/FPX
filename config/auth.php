<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',

    ],



    'guards' => [

        'api' => [
            'driver' => 'jwt',
            'provider' => 'clubs',
        ],
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'player' => [
            'driver' => 'session',
            'provider' => 'players',
        ],
        'coach' => [
            'driver' => 'session',
            'provider' => 'coaches',
        ],










        //start for api//
        //start for api//

        'admin-api' => [
            'driver' => 'jwt',
            'provider' => 'admins',
            'hash' => false,
        ],
        'coach-api' => [
            'driver' => 'jwt',
            'provider' => 'coaches',
            'hash' => false,
        ],
        'player-api' => [
            'driver' => 'jwt',
            'provider' => 'players',
            'hash' => false,
        ],
        'club-api' => [
            'driver' => 'jwt',
            'provider' => 'clubs',
            'hash' => false,
        ],
        'user-api' => [
            'driver' => 'jwt',
            'provider' => 'users',
            'hash' => false,
        ],




        //end for api//
        //end for api//
    ],










    /////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'players' => [
            'driver' => 'eloquent',
            'model' => App\Models\Player::class,
        ],
        'coaches' => [
            'driver' => 'eloquent',
            'model' => App\Models\Coach::class,
        ],




    ],



    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],



    'password_timeout' => 10800,

];
