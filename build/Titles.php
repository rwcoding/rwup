<?php

class Titles
{
    private static ?array $configTitles = null;

    public static function configTitles(): array
    {
        if (self::$configTitles === null) {
            $result = [];
            $file = Data::root() . DIRECTORY_SEPARATOR . "_titles.php";
            if (file_exists($file)) {
                $data = Data::php($file);
                foreach ($data as $k => $v) {
                    if (str_starts_with($k, '$')) {
                        $result[$k] = $v;
                    } else {
                        $result['$' . $k] = $v;
                    }
                }
            }
            self::$configTitles = $result;
        }
        return self::$configTitles;
    }
}
