<?php

namespace App\Services;

use App\Models\LogModel;

/**
 * @method self userId(int $data)
 * @method self type(int $data)
 * @method self target(int $data)
 * @method self msg(string $data)
 * @method self details(string $data)
 * @method self ip(string $data)
 */
class LogItemService
{
    private array $data = [
        'userId' => 0,
        'type' => 0,
        'target' => 0,
        'ip' => '',
        'msg' => '',
        'details' => '',
    ];

    public function __call($name, $value)
    {
        $this->data[$name] = $value[0];
        return $this;
    }

    public function save(): bool
    {
        $log = new LogModel();
        $log->user_id = $this->data['userId'];
        $log->type = $this->data['type'];
        $log->msg = $this->data['msg'];
        $log->target = $this->data['target'];
        $log->details = $this->data['details'];
        $log->ip = $this->data['ip'];;
        return $log->save();
    }
}
