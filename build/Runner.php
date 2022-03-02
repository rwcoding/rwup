<?php

class Runner
{
    public static function run(): void
    {
        try {
            $console = new Console();
            $conf = $console->getFlag('conf');
            if (!$conf) {
                $conf = getcwd() . DIRECTORY_SEPARATOR . '.docg';
            }
            if (!file_exists($conf)) {
                throw new \Error("$conf not found");
            }
            Data::$config = parse_ini_file($conf, true);

            $file = Data::root() . DIRECTORY_SEPARATOR . '_init.php';
            if (file_exists($file)) {
                require $file;
            }

            Sync::run();

        } catch (\Throwable $e) {
            print_r($e);
            echo $e->getMessage() . "\n";
        }
    }
}
