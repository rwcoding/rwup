<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $doc_id 文档ID
 * @property int $user_id 用户ID
 * @property string $type 类型
 * @property DocModel $doc
 * @property UserModel $user
 */
class DocMemberModel extends BaseModel
{
    protected $table = "doc_member";

    public function doc(): BelongsTo
    {
        return $this->belongsTo(DocModel::class, 'doc_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }
}
