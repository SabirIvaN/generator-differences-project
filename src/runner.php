<?php

namespace GenDiff\Runner;

use function GenDiff\Parsers\parse;
use function GenDiff\Builder\build;
use function GenDiff\Formatters\Pretty\render;

function run($pathToFile1, $pathToFile2, $format)
{
    checkPath($pathToFile1);
    checkPath($pathToFile2);
    $data1 = getData($pathToFile1);
    $data2 = getData($pathToFile2);
    $ast = build($data1, $data2);
    $renderedAst = chooseRender($ast, $format);
    return $renderedAst;
}

function getData($pathToFile)
{
    $data = file_get_contents($pathToFile);
    if (!$data) {
        throw new \Exception("Can't get a content from {$pathToFile}");
    }
    $dataType = pathinfo($pathToFile, PATHINFO_EXTENSION);
    return parse($data, $dataType);
}

function chooseRender($ast, $format)
{
    $renders = [
        "pretty" => function ($ast) {
            return render($ast);
        }
    ];
    return $renders[$format]($ast);
}

function checkPath($pathToFile)
{
    if (!is_file($pathToFile)) {
        throw new \Exception("{$pathToFile} is not a file");
    }
    if (!is_readable($pathToFile)) {
        throw new \Exception("{$pathToFile} is not readable");
    }
}
