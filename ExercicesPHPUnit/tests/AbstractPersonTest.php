<?php

use PHPUnit\Framework\TestCase;

class AbstractPersonTest extends TestCase
{
    public function testNameAndTitleIsReturned()
    {
        $person = new Doctor('Bob');
        $this->assertEquals('Dr. Bob', $person->getNameAndTitle());
    }

    public function testNameAndTitleIncludesValueFromGetTitle()
    {
        $person = new Doctor('Bob');
        $this->assertStringContainsString('Dr.', $person->getNameAndTitle());
    }
}
