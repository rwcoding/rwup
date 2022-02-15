<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function() {
    $route = require __DIR__.'/route.php';
    foreach ($route as $k=>$v) {
        Route::post($k, [$v,'index']);
    }
});
