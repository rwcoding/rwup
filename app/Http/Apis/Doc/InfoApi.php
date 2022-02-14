<?php

namespace App\Http\Apis\Doc;

use App\Http\Apis\BaseApi;
use App\Models\DocModel;

/**
 * @property int id
 */
class InfoApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "id" => "required|numeric|min:1",
        ];
    }

    public function index(): string|array
    {
        $model = DocModel::query()
                ->select(['id', 'name', 'sname', 'is_share', 'share_code', 'content', 'created_at', 'updated_at'])
                ->find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        return $model->toArray();
    }
}
