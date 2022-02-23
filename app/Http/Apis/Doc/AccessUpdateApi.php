<?php

namespace App\Http\Apis\Doc;

use App\Http\Apis\BaseApi;
use App\Models\DocMemberModel;
use App\Models\DocModel;
use App\Models\UserModel;
use App\Services\AclService;
use App\Services\ApiService;

/**
 * @property int is_rw
 * @property int is_rb
 * @property int is_ww
 * @property int is_wb
 * @property array<string> rw_users
 * @property array<string> rb_users
 * @property array<string> ww_users
 * @property array<string> wb_users
 * @property int id
 */
class AccessUpdateApi extends BaseApi
{
    protected bool $isAdd = true;

    protected array $notNeedFormatField = ['content'];

    public function rules(): array
    {
        return [
            "id" => "required|numeric|min:1",
            "is_rw" => "required|numeric|max:1",
            "is_rb" => "required|numeric|max:1",
            "is_ww" => "required|numeric|max:1",
            "is_wb" => "required|numeric|max:1",
            "rw_users" => "array",
            "rb_users" => "array",
            "ww_users" => "array",
            "wb_users" => "array",
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

        $model->is_rw = $this->is_rw ? 1 : 0;
        $model->is_rb = $this->is_rb ? 1 : 0;
        $model->is_ww = $this->is_ww ? 1 : 0;
        $model->is_wb = $this->is_wb ? 1 : 0;

        if (!$model->save()) {
            return '保存失败';
        }

        $nameToId = [];
        $usernameList = array_merge($this->rw_users, $this->rb_users, $this->ww_users, $this->wb_users);
        $users = UserModel::whereIn('username', $usernameList)->get();
        foreach ($users as $user) {
            $nameToId[$user->username] = $user->id;
        }

        $insert = [];
        foreach ([
            ['type'=>'rw', 'data'=>array_unique($this->rw_users)],
            ['type'=>'rb', 'data'=>array_unique($this->rb_users)],
            ['type'=>'ww', 'data'=>array_unique($this->ww_users)],
            ['type'=>'wb', 'data'=>array_unique($this->wb_users)],
        ] as $item) {
            foreach ($item['data'] as $uname) {
                if (!isset($nameToId[$uname])) {
                    continue;
                }
                $insert[] = [
                    'doc_id' => $this->id,
                    'user_id' => $nameToId[$uname],
                    'type' => $item['type']
                ];
            }
        }
        DocMemberModel::where('doc_id', $this->id)->delete();
        DocMemberModel::insert($insert);

        return ApiService::success();
    }
}
