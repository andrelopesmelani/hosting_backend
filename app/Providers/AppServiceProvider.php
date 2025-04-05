<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        Auth::viaRequest('api', function ($request) {
            return JWTAuth::parseToken()->authenticate();
        });
    }
}
