<?php
$config = require __DIR__ . '/add.php';

return [
    'title' => '更新配置',
    'route' => '/api/config/update',
    'request' => ($config['request'])->add([
        'name' => 'id',
        'type' => 'int',
        'desc' => '配置ID',
        'order' => 1,
    ]),
    'response' => [],
];
