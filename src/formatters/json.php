<?php

namespace GenDiff\Formatters\Json;

function runJsonRender ($ast)
{
    return renderJson($ast);
}

function renderJson ($ast)
{
    $result = json_encode($ast, JSON_PRETTY_PRINT);
    $result = trim($result, "[]");
    $result = "{{$result}}";
    return $result;
}
