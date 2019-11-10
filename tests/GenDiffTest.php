<?php

namespace GenDiff\Tests;

use PHPUnit\Framework\TestCase;

use function GenDiff\Renderer\render;

class GenDiffTests extends TestCase
{
    public function testPrettyResult()
    {
        $path1 = "tests/fixtures/flatBefore.json";
        $path2 = "tests/fixtures/flatAfter.json";
        $path3 = "tests/fixtures/flatBefore.yaml";
        $path4 = "tests/fixtures/flatAfter.yaml";
        $path5 = "tests/fixtures/nestedBefore.json";
        $path6 = "tests/fixtures/nestedAfter.json";
        $path7 = "tests/fixtures/nestedBefore.yaml";
        $path8 = "tests/fixtures/nestedAfter.yaml";
        $expected1 = file_get_contents("tests/fixtures/expected/prettyFlatResult.txt");
        $expected2 = file_get_contents("tests/fixtures/expected/prettyNestedResult.txt");
        $this->assertEquals($expected1, render($path1, $path2, "pretty"));
        $this->assertEquals($expected1, render($path3, $path4, "pretty"));
        $this->assertEquals($expected2, render($path5, $path6, "pretty"));
        $this->assertEquals($expected2, render($path7, $path8, "pretty"));
    }
    public function testPlainResult()
    {
        $path1 = "tests/fixtures/flatBefore.json";
        $path2 = "tests/fixtures/flatAfter.json";
        $path3 = "tests/fixtures/flatBefore.yaml";
        $path4 = "tests/fixtures/flatAfter.yaml";
        $path5 = "tests/fixtures/nestedBefore.json";
        $path6 = "tests/fixtures/nestedAfter.json";
        $path7 = "tests/fixtures/nestedBefore.yaml";
        $path8 = "tests/fixtures/nestedAfter.yaml";
        $expected1 = file_get_contents("tests/fixtures/expected/plainFlatResult.txt");
        $expected2 = file_get_contents("tests/fixtures/expected/plainNestedResult.txt");
        $this->assertEquals($expected1, render($path1, $path2, "plain"));
        $this->assertEquals($expected1, render($path3, $path4, "plain"));
        $this->assertEquals($expected2, render($path5, $path6, "plain"));
        $this->assertEquals($expected2, render($path7, $path8, "plain"));
    }
    public function testJsonResult()
    {
        $path1 = "tests/fixtures/flatBefore.json";
        $path2 = "tests/fixtures/flatAfter.json";
        $path3 = "tests/fixtures/flatBefore.yaml";
        $path4 = "tests/fixtures/flatAfter.yaml";
        $path5 = "tests/fixtures/nestedBefore.json";
        $path6 = "tests/fixtures/nestedAfter.json";
        $path7 = "tests/fixtures/nestedBefore.yaml";
        $path8 = "tests/fixtures/nestedAfter.yaml";
        $expected1 = file_get_contents("tests/fixtures/expected/jsonFlatResult.txt");
        $expected2 = file_get_contents("tests/fixtures/expected/jsonNestedResult.txt");
        $this->assertEquals($expected1, render($path1, $path2, "json"));
        $this->assertEquals($expected1, render($path3, $path4, "json"));
        $this->assertEquals($expected2, render($path5, $path6, "json"));
        $this->assertEquals($expected2, render($path7, $path8, "json"));
    }
}
