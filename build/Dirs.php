<?php

class Dirs
{
    private static ?array $namesInConfig = null;

    public static function mapSignName(): array
    {
        return self::recurseDirName(Data::root());
    }

    public static function configNames(): array
    {
        if (self::$namesInConfig === null) {
            $result = [];
            $file = Data::root() . DIRECTORY_SEPARATOR . '_dirs.php';
            if (file_exists($file)) {
                $names = Data::php($file);
                foreach ($names as $k => $v) {
                    if (str_starts_with($k, '$')) {
                        $result[$k] = $v;
                    } else {
                        $result['$' . $k] = $v;
                    }
                }
            }
            self::$namesInConfig = $result;
        }
        return self::$namesInConfig;
    }

    public static function recurseDirName(string $root): array
    {
        $result = [];
        foreach (scandir($root) as $item) {
            if (str_starts_with($item, '.') ||
                str_starts_with($item, '_')) {
                continue;
            }
            $path = $root . DIRECTORY_SEPARATOR . $item;
            if (is_dir($path)) {
                $result[self::getDirSignByFs($path)] = self::getDirNameByFs($path);
                $result = array_merge($result, self::recurseDirName($path));
            }
        }
        return $result;
    }

    public static function getDirSignByFs(string $path): string
    {
        $key = str_replace(Data::root(), '', $path);
        $key = str_replace('\\', '/', $key);
        return '$' . $key;
    }

    public static function getDirNameByFs(string $path): string
    {
        $config = self::configNames();
        $sign = self::getDirSignByFs($path);
        if (isset($config[$sign])) {
            return $config[$sign];
        }
        return substr($path, strrpos($path, DIRECTORY_SEPARATOR) + 1);
    }
}
