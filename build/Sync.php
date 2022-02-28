<?php

class Sync
{
    private static array $dirs = [];
    private static array $files = [];

    public static function run(): void
    {
        $root = Data::root();
        if (file_exists($root . DIRECTORY_SEPARATOR . '_dirs.php')) {
            $dirs = require $root . DIRECTORY_SEPARATOR . '_dirs.php';
        } else {
            $dirs = self::dirs($root);
        }
        $files = self::files($root);
        $result = Api::check($dirs, $files);
        if ($result['code'] !== 10000) {
            throw new Error($result['msg'] ?: '接口异常');
        }
        $needUpload = $result['data']['files'];
        $docs = [];
        $num = 0;
        foreach ($needUpload as $item) {
            $docs[] = Parser::parse($root . $item);
            echo " -- sync $item ...... \n";
            if (count($docs) >= 5 || count($docs) >= count($needUpload)) {
                $result = Api::sync($docs);
                if ($result['code'] !== 10000) {
                    echo $result['msg'] ?? '接口异常';
                    echo PHP_EOL;
                } else {
                    $num += $result['data']['num'];
                }
                $docs = [];
            }
        }
        echo "[over] sync document $num. \n";
    }

    public static function dirs(string $root): array
    {
        foreach (scandir($root) as $item) {
            if (str_starts_with($item, '.') ||
                str_starts_with($item, '_')) {
                continue;
            }
            $path = $root . DIRECTORY_SEPARATOR . $item;
            if (is_dir($path)) {
                $key = str_replace(Data::root(), '', $path);
                $key = str_replace('\\', '/', $key);
                $name = substr($path, strrpos($path, DIRECTORY_SEPARATOR) + 1);
                self::$dirs[$key] = $name;
                self::dirs($path);
            }
        }
        return self::$dirs;
    }

    public static function files(string $root): array
    {
        foreach (scandir($root) as $item) {
            if (str_starts_with($item, '.') ||
                str_starts_with($item, '_')) {
                continue;
            }
            $path = $root . DIRECTORY_SEPARATOR . $item;
            if (is_file($path)) {
                $key = str_replace(Data::root(), '', $path);
                $key = str_replace('\\', '/', $key);
                // $key = substr($key, 0, strrpos($key, '.'));
                self::$files[$key] = md5_file($path);
            } else {
                self::files($path);
            }
        }
        return self::$files;
    }
}
