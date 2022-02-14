<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property string $name 名称
 * @property string $sname 短名称
 * @property string $content 内容
 * @property int $doc_id 文档ID
 * @property int $user_id 创建人
 * @property DocModel $doc
 */
class DocLogModel extends BaseModel
{
    protected $table = "doc_log";

    public function doc(): BelongsTo
    {
        return $this->belongsTo(DocModel::class, 'doc_id', 'id');
    }
}
