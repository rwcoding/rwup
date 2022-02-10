<?php

namespace App\Http\Apis\Config;

use App\Http\Apis\BaseApi;
use App\Services\ApiService;
use App\Services\ConfigService;

/**
 * @property string k
 * @property string v
 * @property string data_type
 * @property int id
 */
class AddApi extends BaseApi
{
    protected bool $isAdd = true;

    public function rules(): array
    {
        $rules = [
            "name" => "required|min:2|max:30",
            "k" => "required|min:2|max:50",
            "v" => "required|min:2",
            "data_type" => "required|min:2",
        ];

        if (!$this->isAdd) {
            $rules['id'] = "required|numeric|min:1";
        }

        return $rules;
    }

    public function index(): string|array
    {
        $model = ConfigService::set(trim($this->k), trim($this->v), $this->data_type);
        if ($model) {
            return ApiService::failure('添加失败');
        }
        return ['id' => $model->id];
    }
}
