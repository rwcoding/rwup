<?php

namespace App\Http\Apis\Doc;

use App\Http\Apis\BaseApi;
use App\Models\DocMemberModel;
use App\Models\DocModel;
use App\Models\UserModel;
use App\Services\AclService;
use App\Services\ApiService;

/**
 * @property string content
 * @property int id
 */
class ContentApi extends BaseApi
{
    protected array $notNeedFormatField = ['content'];

    public function rules(): array
    {
        return [
            "id" => "required|numeric|min:1",
            "content" => "string",
        ];
    }

    public function index(): string|array
    {
        $user = $this->getUser();
        $model = DocModel::find($this->id);
        if (!$model) {
            return '无效的数据';
        }
        $project = $model->project;

        if (!$project) {
            return '无效的工程';
        }

        // todo 权限验证
        if (!AclService::allowWriteDoc($model, $user)) {
            return "您没有权限编辑该文档";
        }

        $model->content = $this->content;
        if (!$model->save()) {
            return '保存失败';
        }

        //todo log
        return ApiService::success();
    }
}
