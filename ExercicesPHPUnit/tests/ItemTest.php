<?php

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testDescriptionIsNotEmpty()
    {
        $item = new ItemChild();
        $this->assertNotEmpty($item->getDescription());
    }

    public function testIDisAnInteger()
    {
        $item = new ItemChild();
        $this->assertIsInt($item->getID());
    }

    public function testTokenIsAString()
    {
        $item = new ItemChild();
        $this->assertIsString($item->getToken());
    }

    public function testPrefixedTokenStartsWithPrefix()
    {
        $item = new ItemChild();
        $token = $item->getToken();
        $prefixedToken = $item->getPrefixedToken($token);
        $this->assertNotEquals(strlen($token), strlen($prefixedToken));
    }
}
