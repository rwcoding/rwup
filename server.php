<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/') {
    $file = __DIR__.'/public'.$uri;
    if (!file_exists($file)) {
        $file = __DIR__.'/storage/app/public'.$uri;
    }
    if (file_exists($file)) {
        $types = [
            'js' => 'application/javascript',
            'css' => 'text/css',
            'png' => 'image/png',
            'jpg' => 'image/jpg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'ico' => 'image/x-icon',
            'woff' => 'application/font-woff',
        ];
        $path = parse_url($uri)['path'];
        $pathInfo = pathinfo($path);
        $extension = $pathInfo['extension'] ?? '';
        header('Content-Type: '.($types[$extension] ?? 'text/html'));
        echo file_get_contents($file);
        die;
    }
}

require_once __DIR__.'/public/index.php';
