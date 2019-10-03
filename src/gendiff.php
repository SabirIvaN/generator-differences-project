<?php

namespace GenDiff\Gendiff;

use function Differ\MakeDiffAst\makeDiffAst;
use function Differ\Renderers\Pretty\render;
use function Differ\SelectRender\selectRender;

function getContent($pathToFile)
{
    if (!file_exists($pathToFile)) {
        throw new \Exception("File not found!");
    }

    $fileContent = file_get_contents($pathToFile);

    return $fileContent;
}

function getDataType($pathToFile)
{
    return pathinfo($pathToFile, PATHINFO_EXTENSION);
}

function parseContent($content, $dataType)
{
    switch ($dataType) {
        case 'json':
            return json_decode($content, true);
    }
}

function gendiff($pathToFile1, $pathToFile2, $format)
{
    $fileContent1 = getContent($pathToFile1);
    $fileContent2 = getContent($pathToFile2);

    $getDataType1 = getDataType($pathToFile1);
    $getDataType2 = getDataType($pathToFile2);

    $content1 = parseContent($fileContent1, $getDataType1);
    $content2 = parseContent($fileContent2, $getDataType2);

    if (is_null($content1) || is_null($content2)) {
        throw new \Exception("Wrong file format!");
    }

    $ast = makeDiffAst($content1, $content2);

    return selectRender($ast, $format);
}
