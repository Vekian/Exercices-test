<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIDIsAnInteger()
    {
        $product = new Product();
        // Utiliser la réflexion pour accéder à la propriété protégée
        $reflection = new ReflectionClass(Product::class);
        $property = $reflection->getProperty('product_id');
        $property->setAccessible(true);

        $this->assertIsInt($property->getValue($product));
    }
}
