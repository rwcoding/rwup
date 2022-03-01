<?php

return [
    'title' => '用户登录',
    'route' => '/api/open/login',

    'request' => new class {
        #[Att(desc: '账号', length: 30)]
        public string $username;

        #[Att(desc: '密码', length: 30)]
        public string $password;

        #[Att(desc: '平台', length: 2)]
        public int $platform;
    },

    'response' => new class {
        #[Att(desc: '用户Token', length: 64)]
        public string $token;

        #[Att(desc: '签名Key', length: 64)]
        public string $key;
    }
];
