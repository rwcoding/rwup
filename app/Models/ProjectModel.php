<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $name 名称
 * @property string $sname 简称
 * @property string $sign 标识
 * @property int $user_id 用户
 * @property string $manager 管理员集合
 * @property string $allow_read 可读用户集合
 * @property string $allow_write 可写用户集合
 * @property int $doc_num 文档数量
 * @property int $test_num 测试数量
 * @property int $bug_num Bug数量
 * @property int $doc_id 更新文档ID
 * @property int $doc_updater 更新用户
 * @property int $ord 排序
 * @property DocModel $doc
 * @property UserModel $updater
 */
class ProjectModel extends BaseModel
{
    use SoftDeletes;

    protected $table = "project";

    public function doc(): HasOne
    {
        return $this->hasOne(DocModel::class, 'id', 'doc_id');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'doc_updater', 'id');
    }
}
