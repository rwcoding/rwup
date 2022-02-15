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

    public function parse(): void
    {
        $this->attributes = Context::data();
        if (isset($this->rules()['page']) && !isset($this->attributes['page'])) {
            $this->attributes['page'] = 1;
        }
        if (isset($this->rules()['page_size']) && !isset($this->attributes['page_size'])) {
            $this->attributes['page_size'] = 10;
        }
    }

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
        return Context::request()->header('X-Token');
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
        $this->parse();
        if ($rules = $this->rules()) {
            $validator = Validator::make($this->attributes, $rules);
            if ($validator->fails()) {
                return ApiService::failure(implode(";", $validator->errors()->all()));
            }
        }
        $ret = $this->{$method}();
        if (is_array($ret)) {
            return ApiService::success($ret);
        }
        if (is_bool($ret)) {
            if ($ret) {
                return ApiService::success();
            }
            return ApiService::failure();
        }
        if (str_starts_with($ret, '{')) {
            return $ret;
        }
        return ApiService::failure($ret);
    }
}
