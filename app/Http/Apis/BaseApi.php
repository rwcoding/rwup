<?php

namespace App\Http\Apis;

use App\Http\Context;
use App\Services\ApiService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

abstract class BaseApi
{
    private array $attributes = [];

    public function rules(): array
    {
        return [];
    }

    public function __get(string $name)
    {
        return $this->attributes[$name] ?? null;
    }

    public function callAction($method, $parameters): string|Response
    {
        $this->attributes = Context::data();
        if ($rules = $this->rules()) {
            $validator = Validator::make($this->attributes, $rules);
            if ($validator->fails()) {
                return implode(";", $validator->errors()->all());
            }
        }
        $ret = $this->{$method}();
        if (is_array($ret)) {
            return ApiService::success($ret);
        }
        return $ret;
    }
}
