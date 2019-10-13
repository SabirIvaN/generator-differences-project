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
        $result = getData1($key, $data1, $data2);
    } elseif (!array_key_exists($key, $data2)) {
        $result = getData2($key, $data1, $data2);
    } elseif (is_array($data1[$key]) && is_array($data2[$key])) {
        $result = getData3($key, $data1, $data2);
    } elseif ($data1[$key] === $data2[$key]) {
        $result = getData4($key, $data1, $data2);
    } elseif ($data1[$key] !== $data2[$key]) {
        $result = getData5($key, $data1, $data2);
    }
    return $result;
}

function getData1($key, $data1, $data2)
{
    return ['type' => 'added', 'key' => $key, 'value' => $data2[$key]];
}

function getData2($key, $data1, $data2)
{
    return ['type' => 'deleted', 'key' => $key, 'value' => $data1[$key]];
}

function getData3($key, $data1, $data2)
{
    return ['type' => 'parent', 'key' => $key, 'children' => generateAst($data1[$key], $data2[$key])];
}

function getData4($key, $data1, $data2)
{
    return ['type' => 'not changed', 'key' => $key, 'value' => $data1[$key]];
}

function getData5($key, $data1, $data2)
{
    return ['type' => 'changed', 'key' => $key, 'oldValue' => $data1[$key], 'newValue' => $data2[$key]];
}
