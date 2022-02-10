<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')->group(function() {
    Route::get('/login', ["\App\Http\Apis\Auth\LoginApi", "index"]);
    Route::get('/logout', ["\App\Http\Apis\Auth\LogoutApi", "index"]);

    Route::get('/dash', ["\App\Http\Apis\DashApi", "index"]);
});
