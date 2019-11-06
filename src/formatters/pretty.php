<?php

namespace GenDiff\Formatters\Pretty;

function runPrettyRender($ast)
{
    $result = renderPretty($ast);
    return "{\n$result\n}";
}

function renderPretty($ast, $level = 0)
{
    $indent = str_repeat("    ", $level);
    $changes = array_reduce($ast, function ($acc, $node) use ($indent, $level) {
        switch ($node["type"]) {
            case "not changed":
                $acc[] = "{$indent}    {$node["key"]}: " . getValue($node["value"], $level);
                break;
            case "added":
                $acc[] = "{$indent}  + {$node["key"]}: " . getValue($node["value"], $level);
                break;
            case "deleted":
                $acc[] = "{$indent}  - {$node["key"]}: " . getValue($node["value"], $level);
                break;
            case "changed":
                $acc[] = "{$indent}  + {$node["key"]}: " . getValue($node["newValue"], $level);
                $acc[] = "{$indent}  - {$node["key"]}: " . getValue($node["oldValue"], $level);
                break;
            case "parent":
                $children = renderPretty($node["children"], $level + 1);
                $acc[] = "{$indent}    {$node["key"]}: {\n{$children}\n    {$indent}}";
                break;
        }
        return $acc;
    });
    $result = implode(PHP_EOL, $changes);
    return $result;
}

function getValue($data, $level)
{
    if (isBoolean($data)) {
        return $data === true ? "true" : "false";
    } elseif (is_array($data)) {
        return arrayToValue($data, $level);
    } else {
        return $data;
    }
}

function arrayToValue($data, $level)
{
    $indent = str_repeat("    ", $level + 1);
    $keys = array_keys($data);
    $values = array_reduce($keys, function ($acc, $value) use ($indent, $data) {
        $acc[] = "{$indent}  {$value}: {$data[$value]}";
        return $acc;
    });
    $result = implode(PHP_EOL, $values);
    return "{\n  $result\n{$indent}}";
}


function isBoolean($data)
{
    return gettype($data) === "boolean";
}
