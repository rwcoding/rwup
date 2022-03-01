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
                'title' => $files[$sign] ?? $info['filename'],
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

    public static function parseObject(object|string $obj): array
    {
        $ref = new ReflectionClass($obj);
        $result = [];
        $order = 100;
        foreach ($ref->getProperties() as $prop) {
            $tmp = ['tree' => []];
            $tmp['name'] = $prop->getName();

            if (method_exists($obj, 'need') && !$obj->need($tmp['name'])) {
                continue;
            }

            $type = $prop->getType();
            if ($type instanceof ReflectionUnionType) {
                foreach ($type->getTypes() as $t) {
                    $name = $t->getName();
                    if ($name != 'array') {
                        if (!in_array($name, [
                            'int', 'float', 'string', 'double', 'bool'
                        ])) {
                            $tmp['type'] = 'array[object]';
                            $tmp['tree'] = self::parseObject($name);
                        } else {
                            $tmp['type'] = 'array[' . $name . ']';
                        }
                    }
                }
            } else {
                $name = $type->getName();
                if (!in_array($name, [
                    'int', 'float', 'string', 'double', 'bool', 'array'
                ])) {
                    $tmp['type'] = 'object';
                    $tmp['tree'] = self::parseObject($name);
                } else {
                    $tmp['type'] = $name;
                }
            }
            $ext = [];
            foreach ($prop->getAttributes() as $attr) {
                $args = $attr->getArguments();
                if (isset($args[0])) {
                    $an = new ($attr->getName())(...$args);
                } else {
                    $an = new ($attr->getName());
                    foreach ($args as $key => $value) {
                        $an->$key = $value;
                    }
                }
                if (method_exists($an, 'parse')) {
                    $ext = array_merge($ext, $an->parse());
                }
            }
            $ext['desc'] = $ext['desc'] ?? '';
            $ext['required'] = $ext['required'] ?? true;
            $ext['length'] = $ext['length'] ?? 0;
            $ext['sample'] = $ext['sample'] ?? '';
            $ext['order'] = $ext['order'] ?? ++$order;

            $tmp = array_merge($tmp, $ext);
            $result[] = $tmp;
        }

        if (method_exists($obj, 'extend')) {
            $result = array_merge($result, $obj->extend());
        }

        $ords = array_column($result, 'order');
        array_multisort($ords, SORT_ASC, $result);

        return $result;
    }
}

