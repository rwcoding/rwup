<?php

class Files
{
    public static function mapSignMd5(string $root): array
    {
        $result = [];
        foreach (scandir($root) as $item) {
            if (str_starts_with($item, '.') ||
                str_starts_with($item, '_')) {
                continue;
            }
            $path = $root . DIRECTORY_SEPARATOR . $item;
            if (is_file($path)) {
                if (!self::allowFile($item)) {
                    continue;
                }
                $result[self::getFileSignByFs($path)] = [
                    'md5' => md5_file($path),
                    'file' => self::getFileRelativePath($path),
                    'title' => self::getFileTitleByFs($path)
                ];
            } else {
                $result = array_merge($result, self::mapSignMd5($path));
            }
        }
        return $result;
    }

    public static function allowFile(string $file): bool
    {
        if (str_starts_with($file, '.') ||
            str_starts_with($file, '_')) {
            return false;
        }
        $ext = !empty(Data::$config['parse']) ? explode(',', Data::$config['parse']) : [];
        if (!$ext) {
            return true;
        }
        $info = pathinfo($file);
        if (!isset($info['extension']) ||
            !in_array($info['extension'], $ext)) {
            return false;
        }
        return true;
    }

    public static function getFileRelativePath(string $file): string
    {
        return str_replace('\\', '/', str_replace(Data::root(), '', $file));
    }

    public static function getFileSignByFs(string $path, string $route = ''): string
    {
        if ($route) {
            return '$' . $route;
        }
        if (str_ends_with($path, '.php')) {
            $arr = Data::php($path);
            if (!empty($arr['route'])) {
                return '$' . $arr['route'];
            }
        }
        return '$' . str_replace('\\', '/', str_replace(Data::root(), '', $path));
    }

    public static function getDirSignByFile(string $path): string
    {
        $fs = str_replace('\\', '/', str_replace(Data::root(), '', $path));
        return '$' . pathinfo($fs)['dirname'];
    }

    public static function getFileTitleByFs(string $path): string
    {
        $config = Titles::configTitles();
        $sign = self::getFileSignByFs($path);
        if (isset($config[$sign])) {
            return $config[$sign];
        }

        if (str_ends_with($path, '.php')) {
            $arr = Data::php($path);
            if (!empty($arr['title'])) {
                return $arr['title'];
            }
        }

        return pathinfo($path)['filename'];
    }
}
