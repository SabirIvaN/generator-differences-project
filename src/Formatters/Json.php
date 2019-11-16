<?php

namespace GenDiff\Formatters\Json;

function runJsonRender($ast)
{
    $decodeJson = json_encode($ast, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
    $result = "{" . trim($decodeJson, "[]") . "}";
    return $result;
}
