<?php

namespace GenDiff\Tests;

use PHPUnit\Framework\TestCase;

use function GenDiff\Runner\run;

class GenDiffTests extends TestCase
{
    public function testPrettyFlatResult()
    {
        $path1 = "tests/fixtures/flatBefore.json";
        $path2 = "tests/fixtures/flatAfter.json";
        $path3 = "tests/fixtures/flatBefore.yaml";
        $path4 = "tests/fixtures/flatAfter.yaml";
        $expected = file_get_contents("tests/fixtures/expected/prettyFlatResult.txt");
        $this->assertEquals($expected, run($path1, $path2, "pretty"));
        $this->assertEquals($expected, run($path3, $path4, "pretty"));
    }
    public function testPrettyNestedResult()
    {
      $path1 = "tests/fixtures/nestedBefore.json";
      $path2 = "tests/fixtures/nestedAfter.json";
      $path3 = "tests/fixtures/nestedBefore.yaml";
      $path4 = "tests/fixtures/nestedAfter.yaml";
      $expected = file_get_contents("tests/fixtures/expected/prettyNestedResult.txt");
      $this->assertEquals($expected, run($path1, $path2, "pretty"));
      $this->assertEquals($expected, run($path3, $path4, "pretty"));
    }
    public function testPlainFlatResult()
    {
        $path1 = "tests/fixtures/flatBefore.json";
        $path2 = "tests/fixtures/flatAfter.json";
        $path3 = "tests/fixtures/flatBefore.yaml";
        $path4 = "tests/fixtures/flatAfter.yaml";
        $expected = file_get_contents("tests/fixtures/expected/plainFlatResult.txt");
        $this->assertEquals($expected, run($path1, $path2, "plain"));
        $this->assertEquals($expected, run($path3, $path4, "plain"));
    }
    public function testPlainNestedResult()
    {
      $path1 = "tests/fixtures/nestedBefore.json";
      $path2 = "tests/fixtures/nestedAfter.json";
      $path3 = "tests/fixtures/nestedBefore.yaml";
      $path4 = "tests/fixtures/nestedAfter.yaml";
      $expected = file_get_contents("tests/fixtures/expected/plainNestedResult.txt");
      $this->assertEquals($expected, run($path1, $path2, "plain"));
      $this->assertEquals($expected, run($path3, $path4, "plain"));
    }
    public function testJsonFlatResult()
    {
        $path1 = "tests/fixtures/flatBefore.json";
        $path2 = "tests/fixtures/flatAfter.json";
        $path3 = "tests/fixtures/flatBefore.yaml";
        $path4 = "tests/fixtures/flatAfter.yaml";
        $expected = file_get_contents("tests/fixtures/expected/jsonFlatResult.txt");
        $this->assertEquals($expected, run($path1, $path2, "json"));
        $this->assertEquals($expected, run($path3, $path4, "json"));
    }
    public function testJsonNestedResult()
    {
      $path1 = "tests/fixtures/nestedBefore.json";
      $path2 = "tests/fixtures/nestedAfter.json";
      $path3 = "tests/fixtures/nestedBefore.yaml";
      $path4 = "tests/fixtures/nestedAfter.yaml";
      $expected = file_get_contents("tests/fixtures/expected/jsonNestedResult.txt");
      $this->assertEquals($expected, run($path1, $path2, "json"));
      $this->assertEquals($expected, run($path3, $path4, "json"));
    }
}
