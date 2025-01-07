<?php

require 'functions.php';
use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function testAddReturnsTheCorrectSum()
    {
        $this->assertEquals(5, add(2, 3));
    }

    public function testAddDoesNotReturnTheIncorrectSum()
    {
        $this->assertNotEquals(6, add(2, 3));
    }
}
