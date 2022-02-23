<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $name 名称
 * @property string $sname 短名称
 * @property string $sign 标识
 * @property string $content 内容
 * @property string $content_json DSL
 * @property int $directory_id 目录
 * @property int $project_id 工程
 * @property int $user_id 创建人
 * @property int $is_rw 读白名单
 * @property int $is_rb 读黑名单
 * @property int $is_ww 写白名单
 * @property int $is_wb 写黑名单
 * @property int $is_share 是否分享
 * @property string $share_code 分享码
 * @property int $ord 排序
 * @property ProjectModel $project
 * @property DirectoryModel $directory
 * @property UserModel $user
 */
class DocModel extends BaseModel
{
    protected $table = "doc";

    public function project(): BelongsTo
    {
        return $this->belongsTo(ProjectModel::class, 'project_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }

    public function directory(): BelongsTo
    {
        return $this->belongsTo(DirectoryModel::class, 'directory_id', 'id');
    }
}
