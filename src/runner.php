<?php

namespace GenDiff\Runner;

use Docopt;

use function GenDiff\Generator\generator;

function runner()
{
    $doc = <<<DOC
        Generate diff

        Usage:
          gendiff (-h|--help)
          gendiff [--format <fmt>] <firstFile> <secondFile>

        Options:
          -h --help         Show this screen.
          --format <fmt>    Report format [default: render].
          -v --version      Show version.
     DOC;

    $args = Docopt::handle($doc, ["version" => "GenDiff 0.0.5"]);
    $pathToFile1 = realpath($args["<firstFile>"]);
    $pathToFile2 = realpath($args["<secondFile>"]);
    $format = $args["--format"];

    echo generator($pathToFile1, $pathToFile2, $format) . PHP_EOL;
}
