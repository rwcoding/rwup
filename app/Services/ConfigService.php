<?php

namespace App\Services;

use App\Models\ConfigModel;

class ConfigService
{
    private static array $data = [];

    public static function get(string $key, $default = null): mixed
    {
        if (isset(self::$data[$key])) {
            return self::$data[$key];
        }
        $config = ConfigModel::whereK($key)->first();
        if (!$config) {
            return $default;
        } else {
            return self::setLocal($config);
        }
    }

    public static function setLocal(ConfigModel $config): mixed
    {
        if ($config->data_type === "json") {
            return self::$data[$config->k] = json_decode($config->v, true);
        }
        if ($config->data_type === "int") {
            return self::$data[$config->k] = (int)$config->v;
        }
        if ($config->data_type === "float") {
            return self::$data[$config->k] = (float)$config->v;
        }
        if ($config->data_type === "array") {
            return self::$data[$config->k] = explode(",", $config->v);
        }
        return self::$data[$config->k] = $config->v;
    }

    public static function set(string $key, string $value, string $dataType = 'string', string $name = ''): ?ConfigModel
    {
        $config = ConfigModel::whereK($key)->first();
        if (!$config) {
            $config = new ConfigModel();
        }
        $config->k = $key;
        $config->v = $value;
        $config->name = $name;
        $config->data_type = $dataType;
        if ($config->save()) {
            self::setLocal($config);
            return $config;
        }
        return null;
    }

    public static function delete(ConfigModel $config): bool
    {
        $key = $config->k;
        if ($config->delete()) {
            if (isset(self::$data[$key])) {
                unset(self::$data[$key]);
            }
            return true;
        }
        return false;
    }

    public static function typeNames(): array
    {
        return [
            ['k' => 'string', 'v' => '文本'],
            ['k' => 'json', 'v' => 'JSON'],
            ['k' => 'int', 'v' => '整数'],
            ['k' => 'float', 'v' => '浮点数'],
            ['k' => 'array', 'v' => '分隔数组'],
        ];
    }
}
