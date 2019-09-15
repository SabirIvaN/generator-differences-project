<?php

namespace GenDiff\Runner;

use function GenDiff\Differ\genDiff;

function run($doc)
{
    $args = \Docopt::handle($doc, ["version" => "GenDiff. Version 0.6.0"]);

    try {
        $diff = genDiff($args["<firstFile>"], $args["<secondFile>"], $args["--format"]);
    } catch (\Exception $e) {
        echo $e->getMessage() . PHP_EOL;
        exit(1);
    }

    print_r($diff);
}
