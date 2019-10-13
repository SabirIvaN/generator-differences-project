<?php

namespace GenDiff\Builder;

use function Funct\Collection\union;

function build($data1, $data2)
{
    $keys = union(array_keys($data1), array_keys($data2));
    $ast = array_reduce($keys, function ($acc, $key) use ($data1, $data2) {
        $acc[] = getData($key, $data1, $data2);
        return $acc;
    });
    return $ast;
}
function getData($key, $data1, $data2)
{
    if (!array_key_exists($key, $data1)) {
        $result['type'] = 'added';
        $result['key'] = $key;
        $result['value'] = $data2[$key];
    } elseif (!array_key_exists($key, $data2)) {
        $result['type'] = 'deleted';
        $result['key'] = $key;
        $result['value'] = $data1[$key];
    } elseif (is_array($data1[$key]) && is_array($data2[$key])) {
        $result['type'] = 'parent';
        $result['key'] = $key;
        $result['children'] = build($data2[$key]);
    } elseif ($data1[$key] === $data2[$key]) {
        $result['type'] = 'not changed';
        $result['key'] = $key;
        $result['value'] = $data1[$key];
    } elseif ($data1[$key] !== $data2[$key]) {
        $result['type'] = 'changed';
        $result['key'] = $key;
        $result['oldValue'] = $data1[$key];
        $result['newValue'] = $data2[$key];
    }
    return $result;
}
