<?php

#[Attribute(Attribute::TARGET_ALL)]
class Att
{
    public function __construct(
        public string $desc = '',
        public string $rule = '',
        public string $aaa = '',
    ){

    }
}
