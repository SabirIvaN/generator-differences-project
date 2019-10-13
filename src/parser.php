<?php

namespace GenDiff\Parser;

function parse($data, $dataType)
{
    switch ($dataType) {
        case "json":
            $result = json_decode($data, true);
            break;
        default:
            throw new \Exception("Unknown data type");
    }
    return $result;
}
