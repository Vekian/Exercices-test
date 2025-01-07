<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIDIsAnInteger()
    {
        $product = new Product();
        $reflection = new ReflectionClass(Product::class);
        $property = $reflection->getProperty('product_id');
        $property->setAccessible(true);

        $this->assertIsInt($property->getValue($product));
    }
}
