<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CrossDomain
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        if (env('CROSS_DOMAIN')) {
            $response->header('Access-Control-Allow-Origin', '*');
            $response->header('Access-Control-Allow-Headers', 'Content-Type, X-Token, X-Sign, X-Time, X-CSRF-TOKEN, Authorization, X-XSRF-TOKEN');
            $response->header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
            $response->header('Access-Control-Max-Age', 86400);
        }
        return $response;
    }
}
