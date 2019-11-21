<?php

namespace GenDiff\Tests;

use PHPUnit\Framework\TestCase;

use function GenDiff\Renderer\render;

class GenDiffTests extends TestCase
{
    public function setUp(): void
    {
        $this->path1 = "tests/fixtures/nestedBefore.json";
        $this->path2 = "tests/fixtures/nestedAfter.json";
        $this->path3 = "tests/fixtures/nestedBefore.yaml";
        $this->path4 = "tests/fixtures/nestedAfter.yaml";
    }

    public function testPrettyResult()
    {
        $expected = file_get_contents("tests/fixtures/expected/prettyNestedResult.txt");
        $this->assertEquals($expected, render($this->path1, $this->path2, "pretty"));
        $this->assertEquals($expected, render($this->path3, $this->path4, "pretty"));
    }
    public function testPlainResult()
    {
        $expected = file_get_contents("tests/fixtures/expected/plainNestedResult.txt");
        $this->assertEquals($expected, render($this->path1, $this->path2, "plain"));
        $this->assertEquals($expected, render($this->path3, $this->path4, "plain"));
    }
    public function testJsonResult()
    {
        $expected = file_get_contents("tests/fixtures/expected/jsonNestedResult.txt");
        $this->assertEquals($expected, render($this->path1, $this->path2, "json"));
        $this->assertEquals($expected, render($this->path3, $this->path4, "json"));
    }
}
