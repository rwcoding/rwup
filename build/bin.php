<?php

require __DIR__ . "/Console.php";
require __DIR__ . "/Data.php";
require __DIR__ . "/Helper.php";
require __DIR__ . "/Api.php";
require __DIR__ . "/Parser.php";
require __DIR__ . "/Sync.php";

$_data = [];

//读取配置文件
$console = new Console();
$conf = $console->getFlag('conf');
if (!$conf) {
    $conf = getcwd() . '/.doc.generate';
}
if (!file_exists($conf)) {
    throw new Error("$conf not found");
}
Data::$config = parse_ini_file($conf, true);

Sync::run();
