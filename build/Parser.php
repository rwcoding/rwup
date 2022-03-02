<?php

class Parser
{
    public static function parse(string $file): array
    {
        $file = realpath($file);

        $title = Files::getFileTitleByFs($file);
        $sign = Files::getFileSignByFs($file);
        $dirSign = Files::getDirSignByFile($file);
        $fileSign = md5_file($file);

        if (str_ends_with($file, '.md')) {
            return [
                'title' => $title,
                'sign' => $sign,
                'dir_sign' => $dirSign,
                'file_sign' => $fileSign,
                'content' => file_get_contents($file),
                'struct' => [],
            ];
        } else {
            $arr = Data::php($file);
            $struct = self::parsePHP($arr);
            return [
                'title' => $title,
                'sign' => $sign,
                'dir_sign' => $dirSign,
                'file_sign' => $fileSign,
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

