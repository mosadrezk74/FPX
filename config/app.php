<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),
    'timezone' => 'UTC',
    'locale' => 'en',
    'fallback_locale' => 'en',

    'faker_locale' => 'en_US',



    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',



    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],


    'providers' => ServiceProvider::defaultProviders()->merge([



        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
         App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,






    ])->toArray(),






    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
         App\Providers\BroadcastServiceProvider::class,


    ])->toArray(),

];
