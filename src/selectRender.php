<?php

namespace GenDiff\SelectRender;

function selectRender($ast, $format)
{
    $renderPath = "\GenDiff\Renderers\\$format\\render";
    
    return $renderPath($ast);
}
