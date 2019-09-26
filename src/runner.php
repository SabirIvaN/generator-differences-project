<?php

namespace GenDiff\Runner;

use Docopt;

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

    foreach ($args as $k=>$v) {
        echo $k . ": " . json_encode($v) . PHP_EOL;
    }
}
