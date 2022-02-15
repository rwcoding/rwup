<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
//    public function register()
//    {
//        $this->reportable(function (MethodNotAllowedHttpException $e) {
//            return "";
//        });
//    }
}
