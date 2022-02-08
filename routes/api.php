<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function() {
    Route::get('/login', ["\App\Http\Apis\LoginApi", "index"]);

    Route::get('/dash', ["\App\Http\Apis\DashApi", "index"]);
});
