<?php

namespace App\Providers;

use App\Events\SqlListener;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        QueryExecuted::class => [
            SqlListener::class,
        ],
    ];
}
