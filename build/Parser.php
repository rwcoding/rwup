<?php

class Parser
{
    public static function parse(string $file): array
    {
        $root = Data::root();
        $files = [];
        $f = $root . DIRECTORY_SEPARATOR . '_files.php';
        if (file_exists($f)) {
            $files = require $f;
        }
        $sign = str_replace($root, '', $file);
        $sign = str_replace('\\', '/', $sign);
        $info = pathinfo($file);
        if (str_ends_with($file, '.md')) {
            return [
                'title' => $files[$file] ?? $info['filename'],
                'sign' => $sign,
                'file_sign' => md5_file($file),
                'content' => file_get_contents($file),
            ];
        } else {
            $arr = require $file;
            $struct = self::parsePHP($arr);
            return [
                'title' => $arr['title'] ?? $info['filename'],
                'sign' => $sign,
                'file_sign' => md5_file($file),
                'content' => '',
                'struct' => $struct,
            ];
        }
    }

    public static function parsePHP($arr): array
    {
        $request = !empty($arr['request']) ? self::parseObject($arr['request']) : [];
        $response = !empty($arr['response']) ? self::parseObject($arr['response']) : [];
        return [
            'doc_desc' => $arr['doc_desc'] ?? '',
            'request_desc' => $arr['request_desc'] ?? '',
            'response_desc' => $arr['response_desc'] ?? '',
            'route' => $arr['route'] ?? '',
            'request' => $request,
            'response' => $response,
        ];
    }

    public static function parseObject(object $obj): array
    {
        $ref = new ReflectionClass($obj);
        $properties = [];
        foreach ($ref->getProperties() as $prop) {
            $tmp = [];
            $tmp['name'] = $prop->getName();
            $type = $prop->getType();
            if ($type instanceof ReflectionUnionType) {
                throw new \RuntimeException("");
            } else {
                $tmp['type'] = $prop->getType()->getName();
            }
            foreach ($prop->getAttributes() as $attr) {
                if ($attr->getName() == 'Att') {
                    $args = $attr->getArguments();
                    $tmp['desc'] = $args['desc'] ?? '';
                    $tmp['required'] = $args['required'] ?? true;
                    $tmp['length'] = $args['length'] ?? null;
                    $tmp['sample'] = $args['sample'] ?? '';
                    if (!empty($args['type'])) {
                        // todo 复合类型
                        $tmp['type'] = $args['type'];
                    }
                }
            }
            $properties[] = $tmp;
        }

        return $properties;
    }
}

