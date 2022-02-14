<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $name 名称
 * @property string $sname 短名称
 * @property string $content 内容
 * @property int $pid 上层
 * @property int $project_id 工程
 * @property int $user_id 创建人
 * @property string $user_read 可读用户集合
 * @property string $user_write 可写用户集合
 * @property int $is_share 是否分享
 * @property string $sharecode 分享码
 * @property int $ord 排序
 * @property ProjectModel $project
 */
class DocModel extends BaseModel
{
    protected $table = "doc";

    public function project(): BelongsTo
    {
        return $this->belongsTo(ProjectModel::class, 'project_id', 'id');
    }
}
