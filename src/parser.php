<?php

namespace GenDiff\Parser;

function parse($data, $dataType)
{
    switch ($dataType) {
        case 'json':
            $result = json_decode($data, true);
            break;
        case 'yaml':
        case 'yml':
            $result = Yaml::parse($data);
            break;
        default:
            throw new \Exception("Unknown data type");
    }
    return $result;
}
