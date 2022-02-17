<?php

namespace App\Events;

use Illuminate\Database\Events\QueryExecuted;

class SqlListener
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
