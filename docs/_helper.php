<?php

#[Attribute(Attribute::TARGET_ALL)]
class Att
{
    public function __construct(
        public bool   $required = true,
        public string $desc = '',
        public int    $length = 0,
        public string $sample = '',
        public string $type = '',
    )
    {
    }
}
