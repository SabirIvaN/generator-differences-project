<?php

namespace GenDiff\Renderer;

use function GenDiff\Parser\parse;
use function GenDiff\Builder\build;
use function GenDiff\Formatters\Pretty\runPrettyRender;
use function GenDiff\Formatters\Plain\runPlainRender;
use function GenDiff\Formatters\Json\runJsonRender;

function render($pathToFile1, $pathToFile2, $format)
{
    checkPath($pathToFile1);
    checkPath($pathToFile2);
    $data1 = getData($pathToFile1);
    $data2 = getData($pathToFile2);
    $ast = build($data1, $data2);
    $renderedResult = chooseRender($ast, $format);
    return $renderedResult;
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
            return runPrettyRender($ast);
        },
        "plain" => function ($ast) {
            return runPlainRender($ast);
        },
        "json" => function ($ast) {
            return runJsonRender($ast);
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
