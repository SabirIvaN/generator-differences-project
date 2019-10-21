<?php

namespace GenDiff\Tests;

use PHPUnit\Framework\TestCase;

use function GenDiff\Runner\run;

class GenDiffTests extends TestCase
{
    public function testPretty()
    {
        $path1 = "tests/fixtures/prettyBefore.json";
        $path2 = "tests/fixtures/prettyAfter.json";
        $expected = file_get_contents("tests/fixtures/expected/prettyResult");
        $this->assertEquals($expected, run($path1, $path2, "pretty"));
    }
}
