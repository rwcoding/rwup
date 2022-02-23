<?php
include "Att.php";
$obj = require __DIR__.'/login.php';

$ref = new ReflectionClass($obj);
print_r($ref->getProperties()[2]->getType()->getTypes());
