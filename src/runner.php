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

        Options:
        -h --help                     Show this screen
        -v --version                  Show version
    DOC;

    Docopt::handle($doc, ["version" => "GenDiff 0.0.5"]);
}
