<?php

namespace GenDiff\Renderer;

function render($diffAst, $format)
{
    $formatterName = ucfirst($format);
    $funcName = "GenDiff\Formatters\\{$formatterName}\\render";

    return $funcName($diffAst);
}
