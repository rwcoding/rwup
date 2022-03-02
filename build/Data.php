<?php

class Data
{
    public static array $config = [];
    private static array $cache = [];

    public static function root(): string
    {
        $root = self::$config['root'];
        if (!str_contains($root, ':') && str_starts_with($root, '/')) {
            $root = realpath(__DIR__ . '/' . $root);
            if ($root) {
                throw new \Error('root error');
            }
        } else {
            $root = realpath($root);
        }
        if (!is_dir($root)) {
            throw new \Error('root error');
        }
        return $root;
    }

    public static function php(string $file): array
    {
        if (!isset(self::$cache[$file])) {
            self::$cache[$file] = require $file;
        }
        return self::$cache[$file];
    }
}
