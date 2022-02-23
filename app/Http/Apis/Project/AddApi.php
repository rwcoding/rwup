<?php

namespace App\Http\Apis\Project;

use App\Http\Apis\BaseApi;
use App\Models\ProjectModel;
use App\Services\UserService;

/**
 * @property string name
 * @property string sname
 * @property string sign
 * @property array<int> manager
 * @property array<int> allow_read
 * @property array<int> allow_write
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
            "sname" => "min:1|max:20",
            "sign" => "required|min:2|max:100",
            "ord" => "required|numeric|min:1",
        ];
        if (!$this->isAdd) {
            $rules['id'] = "required|numeric|min:1";
        }
        return $rules;
    }

    public function index(): string|array
    {
        $sm = ProjectModel::where('sign', $this->sign)->first();
        if (!$this->isAdd) {
            $model = ProjectModel::find($this->id);
            if (!$model) {
                return '无效的数据';
            }
            if ($sm && $model->id != $sm->id) {
                return '标识已经存在';
            }
        } else {
            if (ProjectModel::where('sign', $this->sign)->first()) {
                return '标识已经存在';
            }
            $model = new ProjectModel();
        }

        $model->sign = $this->sign;
        $model->name = $this->name;
        $model->sname = $this->sname ?: $this->name;
        $model->ord = $this->ord;

        if (!$model->save()) {
            return '保存失败';
        }
        return ['id' => $model->id];
    }
}
