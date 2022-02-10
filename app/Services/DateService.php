<?php

namespace App\Services;

use DateTimeZone;
use DateTime;
use DateInterval;

class DateService
{
    public static function now(): string
    {
        return (new DateTime("now", new DateTimeZone("UTC")))->format('Y-m-d H:i:s');
    }

    public static function afterDay(int $day, string $format = "Y-m-d H:i:s"): string
    {
        $date = new DateTime("now", new DateTimeZone("UTC"));
        $date->add(new DateInterval('P'.$day.'D'));
        return $date->format($format);
    }
}
