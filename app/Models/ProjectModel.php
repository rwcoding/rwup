<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property string $name 名称
 * @property int $user_id 用户
 * @property string $user_manage 管理员集合
 * @property string $user_read 可读用户集合
 * @property string $user_write 可写用户集合
 * @property int $doc_id 更新文档ID
 * @property int $ord 排序
 * @property DocModel $doc
 * @property UserModel $updater
 */
class ProjectModel extends BaseModel
{
    protected $table = "project";

    public function doc(): HasOne
    {
        return $this->hasOne(DocModel::class, 'id', 'doc_id');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'id', 'doc_updater');
    }
}
