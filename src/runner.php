<?php

namespace GenDiff\Runner;

use Docopt;

use function GenDiff\Generator\generate;

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

    try {
        $diff = generate($args["<firstFile>"], $args["<secondFile>"], $args["--format"]);
    } catch (\Exception $e) {
        echo $e->getMessage() . PHP_EOL;
        exit(1);
    }

    echo $diff;
}
