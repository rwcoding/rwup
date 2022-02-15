<?php

namespace App\Exceptions;

use App\Services\ApiService;
use App\Services\EnvService;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $e): Response
    {
        if (!EnvService::isProd()) {
            $detail = str_replace(["\r\n"], ["\\r", "\\n"], print_r($e->getTrace(), true));
            Log::error($e->getMessage() . "\n" . $detail);
            return response(ApiService::failure($e->getMessage()));
        }
        return response(ApiService::failure('未知错误'));
    }
}
