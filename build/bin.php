<?php

spl_autoload_register(function ($class) {
    $file = __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
    if (file_exists($file)) {
        require __DIR__ . DIRECTORY_SEPARATOR . $class . '.php';
    }
});

Runner::run();
