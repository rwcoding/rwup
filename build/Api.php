<?php

class Api
{
    public static function check(array $dirs, array $files): array
    {
        return self::request('open.sync.check', ['dirs' => $dirs, 'files' => $files]);
    }

    public static function sync(array $docs): array
    {
        return self::request('open.sync', ['docs' => $docs]);
    }

    public static function request(string $cmd, array $params): array
    {
        $config = Data::$config;
        $params['username'] = $config['username'];
        $params['password'] = $config['password'];
        $params['project'] = $config['project'];

        $time = time();
        $path = "/api/" . str_replace('.', '/', $cmd);
        $token = "-";
        $tokenKey = "-";
        $body = $params ? json_encode($params, JSON_UNESCAPED_UNICODE) : '';
        $sign = md5($path . $time . $token . $body . $tokenKey);
        $ch = curl_init($config['url'] . $path);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'X-Time: ' . $time,
            'X-Token: ' . $token,
            'X-Sign: ' . $sign,
        ]);
        $result = curl_exec($ch);
        if (!$result) {
            throw new \Error(curl_error($ch));
        }
        curl_close($ch);
        return json_decode($result, true);
    }
}
