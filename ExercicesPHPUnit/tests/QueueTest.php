<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue();
    }

    public function testNewQueueIsEmpty()
    {
        $reflection = new ReflectionClass(Queue::class);
        $property = $reflection->getProperty('items');
        $property->setAccessible(true);
        $this->assertIsArray($property->getValue($this->queue));
        $this->assertEmpty($property->getValue($this->queue));
    }

    public function testAnItemIsAddedToTheQueue()
    {
        $this->queue->push('item1');
        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        $this->queue->push('item1');
        $this->queue->push('item2');
        $this->queue->pop();
        $this->assertEquals(1, $this->queue->getCount());
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        $this->queue->push('item1');
        $this->queue->push('item2');
        $this->queue->pop();
        $reflection = new ReflectionClass(Queue::class);
        $property = $reflection->getProperty('items');
        $property->setAccessible(true);
        $this->assertEquals(['item2'], $property->getValue($this->queue));
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; ++$i) {
            $this->queue->push("item$i");
        }
        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; ++$i) {
            $this->queue->push("item$i");
        }
        $this->expectException(QueueException::class);
        $this->queue->push('item4');
    }
}
