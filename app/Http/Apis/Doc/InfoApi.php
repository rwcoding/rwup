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
                ->select([
                    'id', 'name', 'sname', 'sign',
                    'project_id', 'directory_id',
                    'is_share', 'share_code',
                    'created_at', 'updated_at', 'ord',
                    'is_rw', 'is_rb', 'is_ww', 'is_wb'
                ])
                ->find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        return $model->toArray();
    }
}
