<?php

return [
    'title' => '新增配置',
    'route' => '/api/config/add',

    'request' => new class extends Params {
        #[Att(desc: '名称')]
        public string $name;

        #[Att(desc: '键')]
        public string $k;

        #[Att(desc: '值')]
        public string $v;

        #[Att(desc: '数据类型')]
        public string $data_type;
    },

    'response' => new class {
        #[Att(desc: '新增ID')]
        public int $id;
    }
];
