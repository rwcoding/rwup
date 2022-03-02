<?php

namespace App\Http\Apis\Open;

use App\Http\Apis\BaseApi;
use App\Models\DocModel;

/**
 * @property string $code
 */
class ShareApi extends BaseApi
{
    public function rules(): array
    {
        return [
            "code" => "required|size:32",
        ];
    }

    public function index(): string|array
    {
        $doc = DocModel::where("share_code", $this->code)->first();
        if (!$doc || !$doc->is_share) {
            return "无效的分享文档";
        }

        return [
            'title' => $doc->title,
            'content' => $doc->content,
        ];
    }
}
