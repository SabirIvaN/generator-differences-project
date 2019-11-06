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

function getIndex($key, $data1, $data2)
{
    if (!array_key_exists($key, $data1)) {
        $index = 0;
    } elseif (!array_key_exists($key, $data2)) {
        $index = 1;
    } elseif (is_array($data1[$key]) && is_array($data2[$key])) {
        $index = 2;
    } elseif ($data1[$key] === $data2[$key]) {
        $index = 3;
    } elseif ($data1[$key] !== $data2[$key]) {
        $index = 4;
    }
    return $index;
}

function getData($key, $data1, $data2)
{
    $index = getIndex($key, $data1, $data2);
    switch ($index) {
        case 0:
            $result = getAdded($key, $data1, $data2);
            break;
        case 1:
            $result = getDeleted($key, $data1, $data2);
            break;
        case 2:
            $result = getParent($key, $data1, $data2);
            break;
        case 3:
            $result = getNotChanged($key, $data1, $data2);
            break;
        case 4:
            $result = getChanged($key, $data1, $data2);
            break;
    }
    return $result;
}

function getAdded($key, $data1, $data2)
{
    return ["type" => "added", "key" => $key, "value" => $data2[$key]];
}

function getDeleted($key, $data1, $data2)
{
    return ["type" => "deleted", "key" => $key, "value" => $data1[$key]];
}

function getParent($key, $data1, $data2)
{
    return ["type" => "parent", "key" => $key, "children" => build($data1[$key], $data2[$key])];
}

function getNotChanged($key, $data1, $data2)
{
    return ["type" => "not changed", "key" => $key, "value" => $data1[$key]];
}

function getChanged($key, $data1, $data2)
{
    return ["type" => "changed", "key" => $key, "oldValue" => $data1[$key], "newValue" => $data2[$key]];
}
