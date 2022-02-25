<?php

namespace App\Http\Apis\Doc;

use App\Http\Apis\BaseApi;
use App\Models\DocModel;
use App\Services\AclService;
use App\Services\ApiService;
use App\Services\ConfigService;
use Illuminate\Support\Str;

/**
 * @property string file
 * @property string name
 * @property int size
 * @property int id
 */
class UploadApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "id" => "required|numeric|min:1",
            "size" => "required|numeric",
            "name" => "required",
            "file" => "required",
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

        $max = ConfigService::get('upload_max', 2 * 1024 * 1024);
        if ($this->size > $max) {
            return '上传文件 '.$this->name.' 过大, 不能超过'.$max;
        }

        $info = pathinfo($this->name);
        if (empty($info['extension'])) {
            return "无效的文件";
        }

        //$newName = $this->id.'-'.$user->id.'-'.time().'-'.rand(100,999).'.'.$info['extension'];
        $newName = md5($this->file).'.'.$info['extension'];
        if (in_array($info['extension'], ['jpg', 'jpeg','png', 'bmp', 'webp', 'gif', 'ico', ''])) {
            $target = base_path('storage/app').'/public/images/'.$newName;
            $url = '/images/'.$newName;
        } else {
            $target = base_path('storage/app').'/public/files/'.$newName;
            $url = '/files/'.$newName;
        }

        $pos = strpos($this->file, ',');
        if ($pos !== false) {
            $this->file = substr($this->file, $pos+1);
        }
        $binary = base64_decode($this->file);
        file_put_contents($target, $binary);
        $domain = ConfigService::get('static_url', '');
        if (env('APP_ENV') == 'development') {
            $domain = 'http://localhost:8000';
        }
        return ['url' => $domain.$url];
    }
}
