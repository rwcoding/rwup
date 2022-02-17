<?php

namespace App\Http;

use App\Http\Middleware\Auth;
use App\Http\Middleware\CrossDomain;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        CrossDomain::class,
    ];

    protected $middlewareGroups = [
        'api' => [
            Auth::class,
        ],
    ];
}
