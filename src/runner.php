<?php

namespace GenDiff\Runner;

use Docopt;

use function Differ\Gendiff\gendiff;

function run()
{
    $doc = <<<DOC
        Generate diff

        Usage:
        gendiff (-h|--help)
        gendiff (-v|--version)
        gendiff [--format <fmt>] <firstFile> <secondFile>

        Options:
        -h --help                     Show this screen
        -v --version                  Show version
        --format <fmt>                Report format [default: pretty]
    DOC;

    $args = Docopt::handle($doc, ["version" => "GenDiff 0.0.5"]);

    $pathToFile1 = realpath($args["<firstFile>"]);
    $pathToFile2 = realpath($args["<secondFile>"]);
    $format = $args["--format"];

    foreach ($args as $k => $v) {
        echo $k . ": " . json_encode($v) . PHP_EOL;
    }
}
