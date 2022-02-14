<?php

namespace App\Http\Apis\Project;

use App\Http\Apis\BaseApi;
use App\Models\ProjectModel;
use App\Services\UserService;

/**
 * @property string name
 * @property array<int> user_manage
 * @property array<int> user_read
 * @property array<int> user_write
 * @property int ord
 * @property int id
 */
class AddApi extends BaseApi
{
    protected bool $isAdd = true;

    public function rules(): array
    {
        $rules = [
            "name" => "required|min:2|max:100",
            "user_manage" => "array",
            "user_read" => "array",
            "user_write" => "array",
            "ord" => "required|numeric|min:1",
        ];
        if (!$this->isAdd) {
            $rules['id'] = "required|numeric|min:1";
        }
        return $rules;
    }

    public function index(): string|array
    {
        if (!$this->isAdd) {
            $model = ProjectModel::find($this->id);
            if (!$model) {
                return '无效的数据';
            }
        } else {
            $model = new ProjectModel();
        }

        $model->name = $this->name;
        $model->user_manage = $this->user_manage ? implode(',', $this->user_manage) : '';
        $model->user_read = $this->user_read ? implode(',', $this->user_read) : '';
        $model->user_write = $this->user_manage ? implode(',', $this->user_write) : '';
        $model->ord = $this->ord;

        if (!$model->save()) {
            return '保存失败';
        }
        return ['id' => $model->id];
    }
}
