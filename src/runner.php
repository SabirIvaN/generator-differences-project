<?php

namespace GenDiff\Runner;

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
					-h --help         Show this screen.
					-v --version      Show version.
					--format <fmt>    Report format [default: pretty].
		DOC;

    try {
        $args = \Docopt::handle($doc, array("version" => "GenDiff 1.0"));
        $diff = generate($args["<firstFile>"], $args["<secondFile>"], $args["--format"]);
        print_r($diff);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
    echo "\n";
}
