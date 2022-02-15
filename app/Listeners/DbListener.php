<?php

namespace App\Listeners;

use Illuminate\Database\Events\QueryExecuted;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;

class DbListener
{
    public function handle(QueryExecuted $event): void
    {
        $bindings = "";
        foreach($event->bindings as $k => $v) {
            if ($v instanceof \DateTime) {
                $v = $v->format("Y-m-d H:i:s");
            }
            $bindings .= $k . ": " . $v . "\n";
        }
        file_put_contents(storage_path('logs/sql.log'),
            str_repeat('-', 100) . "\n" . $event->sql . "\n" . $bindings,
            FILE_APPEND);
    }
}
