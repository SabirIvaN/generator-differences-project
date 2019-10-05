<?php

namespace GenDiff\Selecter;

function selecter($ast, $format)
{
    $renderPath = "\GenDiff\Renderers\\$format\\Render";

    return $renderPath($ast);
}
