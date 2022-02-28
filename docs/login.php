<?php

$desc = <<<'EOT'
> Hello World
> Hello World
> Hello World
> Hello World  
EOT;


return [
    'title' => '用户登录',
    'route' => '/api/open/login',

    'doc_desc' => $desc,

    'request' => new class {
        #[Att(desc: '账号', length: 30)]
        public string $username;

        #[Att(desc: '密码', length: 30)]
        public string $password;

        #[Att(desc: '平台', length: 2)]
        public int $platform;
    },

    'response' => new class {
        #[Att(desc: 'KEY', length: 69)]
        public string $token;
    }
];
