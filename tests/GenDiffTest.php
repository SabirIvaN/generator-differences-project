<?php

namespace GenDiff\Tests;

use PHPUnit\Framework\TestCase;

use function GenDiff\Runner\run;

class GenDiffTests extends TestCase
{
    public function testPrettyResult()
    {
        $path1 = "tests/fixtures/flatBefore.json";
        $path2 = "tests/fixtures/flatAfter.json";
        $path3 = "tests/fixtures/flatBefore.yaml";
        $path4 = "tests/fixtures/flatAfter.yaml";
        $expected = file_get_contents("tests/fixtures/expected/prettyFlatResult.txt");
        $this->assertEquals($expected, run($path1, $path2, "pretty"));
        $this->assertEquals($expected, run($path3, $path4, "pretty"));
    }
    public function testNestedResult()
    {
      $path1 = "tests/fixtures/nestedBefore.json";
      $path2 = "tests/fixtures/nestedAfter.json";
      $path3 = "tests/fixtures/nestedBefore.yaml";
      $path4 = "tests/fixtures/nestedAfter.yaml";
      $expected = file_get_contents("tests/fixtures/expected/prettyNestedResult.txt");
      $this->assertEquals($expected, run($path1, $path2, "pretty"));
    }
}
