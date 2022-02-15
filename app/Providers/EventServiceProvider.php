<?php

namespace App\Providers;

use App\Listeners\DbListener;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        QueryExecuted::class => [
            DbListener::class,
        ],
    ];
}
