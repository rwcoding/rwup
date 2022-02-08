<?php

namespace App\Http;

use App\Http\Middleware\Auth;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middlewareGroups = [
        'api' => [
            //'throttle:api',
            Auth::class,
        ],
    ];
}
