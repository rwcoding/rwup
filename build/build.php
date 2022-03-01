<?php
$files = [];
foreach (scandir(__DIR__) as $item) {
    if (str_starts_with($item, '.') ||
        ctype_lower(substr($item, 0, 1))) {
        continue;
    }
    $files[] = __DIR__ . '/' . $item;
}
$namespace = "DocGenerate" . rand(100000, 999999);
$text = "#!/usr/bin/env php\n";
$text .= "<?php \n";
$text .= "namespace $namespace { \n";
foreach ($files as $file) {
    $text .= trim(str_replace("<?php", "", file_get_contents($file))) . "\n";
}
$text .= "\\$namespace\Runner::run(); \n}";

//$target = __DIR__ . '/../tmp/docg';
$target = __DIR__ . '/../docg';
file_put_contents($target, $text);

echo "generate file $target \n";
