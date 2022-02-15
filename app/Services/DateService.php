<?php

namespace App\Services;

use DateTimeZone;
use DateTime;
use DateInterval;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class DateService
{
    public static function now(): string
    {
        return (new DateTime("now", new DateTimeZone("UTC")))
            ->format('Y-m-d H:i:s');
    }

    public static function afterSecond(int $second): string
    {
        return (new DateTime())
            ->setTimestamp(time() + $second)
            ->setTimezone(new DateTimeZone("UTC"))
            ->format('Y-m-d H:i:s');
    }

    public static function after(string $duration): string
    {
        return (new DateTime("now", new DateTimeZone("UTC")))
            ->add(new DateInterval($duration))
            ->format('Y-m-d H:i:s');
    }

    public static function afterDay(int $day, string $format = "Y-m-d H:i:s"): string
    {
        return (new DateTime("now", new DateTimeZone("UTC")))
            ->add(new DateInterval('P'.$day.'D'))
            ->format($format);
    }
}
