<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase {

    protected $queue;

    protected function setUp() :void
    {
        $this->queue = new Queue;
    }

    public function testNewQueueIsEmpty() {
    }
    

    public function testAnItemIsAddedToTheQueue() {

    }

    public function testAnItemIsRemovedFromTheQueue() { 

    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue() {
    }

    public function testMaxNumberOfItemsCanBeAdded() {
    }
    
    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
    }      
}