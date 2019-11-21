<?php

namespace GenDiff\Formatters\Json;

function runJsonRender($ast)
{
    return json_encode($ast, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
}
