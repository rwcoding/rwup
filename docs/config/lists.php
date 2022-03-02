<?php

class DocConfigListKV
{
    #[Att(desc: '键')]
    public string $k;

    #[Att(desc: '值')]
    public string $v;
}

class DocConfigListItem
{
    #[Att(desc: 'ID')]
    public int $id;

    #[Att(desc: '名称')]
    public string $name;

    #[Att(desc: '键')]
    public string $k;

    #[Att(desc: '值')]
    public string $v;

    #[Att(desc: '数据类型')]
    public string $data_type;

    #[Att(desc: '创建时间')]
    public string $created_at;
}

return [
    'title' => '配置列表',
    'route' => '/api/config/list',

    'request' => new class {
        #[Att(desc: '当前页', length: 5)]
        public int $page;

        #[Att(desc: '每页数', length: 3)]
        public int $page_size;

        #[Att(desc: '搜索', length: 30)]
        public string $key;
    },

    'response' => new class {
        #[Att(desc: '数据')]
        public array|DocConfigListItem $datas;

        #[Att(desc: '总数')]
        public int $count;

        #[Att(desc: '类型说明')]
        public array|DocConfigListKV $types;
    }
];
