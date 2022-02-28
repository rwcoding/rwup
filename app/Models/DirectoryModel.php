<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $name 名称
 * @property string $sign 工程内唯一标识
 * @property int $pid 上层
 * @property int $project_id 工程
 * @property int $ord 排序
 * @property ProjectModel $project
 * @method static \Illuminate\Database\Eloquent\Builder|static whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereSign($value)
 */
class DirectoryModel extends BaseModel
{
    use SoftDeletes;

    protected $table = "directory";

    public function project(): BelongsTo
    {
        return $this->belongsTo(ProjectModel::class, 'project_id', 'id');
    }
}
