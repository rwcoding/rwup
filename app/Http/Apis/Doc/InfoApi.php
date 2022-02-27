<?php

namespace App\Http\Apis\Doc;

use App\Http\Apis\BaseApi;
use App\Models\DocModel;
use App\Services\AclService;

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
                'id', 'title', 'stitle', 'sign',
                'project_id', 'directory_id',
                'is_share', 'share_code',
                'created_at', 'updated_at', 'ord',
                'is_rw', 'is_rb', 'is_ww', 'is_wb',
                'content'
            ])
            ->find($this->id);
        if (!$model) {
            return '无效的数据';
        }

        if (!AclService::allowReadDoc($model, $this->getUser())) {
            return '您没有权限查阅该文档信息';
        }

        return $model->toArray();
    }
}
