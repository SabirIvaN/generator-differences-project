<?php

namespace GenDiff\Parser;

function parse($data, $type)
{
    $mapping = [
        "json" => function ($rawData) {
            return json_decode($rawData);
        },
    ];
    return $mapping[$type]($data);
}
