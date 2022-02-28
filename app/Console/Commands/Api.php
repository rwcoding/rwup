<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class Api extends Command
{
    protected $signature = 'api {cmd} {data=.}';

    protected $description = 'test api in console';

    public function handle(): int
    {
        $params = [];
        $data = $this->argument('data');
        if ($data === '.') {
            $data = null;
        }
        if ($data) {
            foreach (explode(' ', $data) as $item) {
                if (!$item) {
                    continue;
                }
                $arr = explode('=', $item);
                if (isset($arr[1])) {
                    if (is_numeric($arr[1])) {
                        $arr[1] = (float)$arr[1];
                    }
                    $params[$arr[0]] = $arr[1];
                }
            }
        }

        $time = time();
        $path = "/api/" . str_replace('.', '/', $this->argument('cmd'));
        $token = md5('1-token');
        $tokenKey = md5('1-token-key');
        $body = $params ? json_encode($params) : '';
        $sign = md5($path . $time . $token . $body . $tokenKey);

        $http = Http::withHeaders([
            'X-Time' => $time,
            'X-Token' => $token,
            'X-Sign' => $sign,
        ]);
        $http->withBody($body, "application/json");
        $response = $http->post(env('TEST_API_URL') . $path);

        $body = $response->body();

        $res = json_decode($body, true);
        if (!$res) {
            $this->error($body);
            return -1;
        }

        if ($res['code'] === 10000) {
            $this->comment($body);
            if (!empty($res['data'])) {
                print_r($res['data']);
            }
        } else {
            $this->error($body);
        }
        return 0;
    }

}
