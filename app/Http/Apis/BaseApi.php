<?php

namespace App\Http\Apis;

use App\Http\Context;
use App\Models\UserModel;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

abstract class BaseApi
{
    private array $attributes = [];

    protected array $notNeedFormatField = [];

    public function rules(): array
    {
        return [];
    }

    public function __get(string $name)
    {
        if (isset($this->attributes[$name])) {
            $v = $this->attributes[$name];
            if (is_string($v) && !in_array($name, $this->notNeedFormatField)) {
                return trim($v);
            }
            return $v;
        }
        return null;
    }

    public function getToken(): string
    {
        return Context::request()->header('Ms-Token');
    }

    public function getUser(): UserModel
    {
        return Context::user();
    }

    public function getRequest(): Request
    {
        return Context::request();
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
