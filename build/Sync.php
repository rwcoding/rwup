<?php

class Sync
{
    private static array $dirs = [];
    private static array $files = [];

    public static function run(): void
    {
        $root = Data::root();
        $dirs = Dirs::mapSignName();
        $files = Files::mapSignMd5($root);

        $result = Api::check($dirs, $files, Titles::configTitles());
        if ($result['code'] !== 10000) {
            throw new \Error($result['msg'] ?: '接口异常');
        }
        $needUpload = $result['data']['files'];
        $docs = [];
        $num = 0;
        foreach ($needUpload as $item) {
            $docs[] = Parser::parse($root . $item);
            echo " -- sync $item ...... \n";
            if (count($docs) >= 5) {
                $num += self::syncDoc($docs);
                $docs = [];
            }
        }
        if (!empty($docs)) {
            $num += self::syncDoc($docs);
        }
        echo "[over] sync document $num. \n";
    }

    public static function syncDoc(array $docs): int
    {
        $result = Api::sync($docs);
        if ($result['code'] !== 10000) {
            echo $result['msg'] ?? '接口异常';
            echo PHP_EOL;
            return 0;
        } else {
            return $result['data']['num'];
        }
    }


}
