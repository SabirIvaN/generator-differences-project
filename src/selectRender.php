<?php

namespace GenDiff\SelectRender;

function selectRender($ast, $format)
{
  $renderPath = "\Differ\Renderers\\$format\\Render";

  return $renderPath($ast);
}
