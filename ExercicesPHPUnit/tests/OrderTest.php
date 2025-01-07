<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    // Utiliser la librairie Mockery : https://github.com/mockery/mockery

    /*
        Qu'est-ce que la methode tearDown() ?
        Quel est le but de cette methode ?
        Quel est le but de la methode tearDown() dans ce test a votre avis ?
        Tips parce que je suis sympatique: https://docs.phpunit.de/en/10.5/fixtures.html
    */
    protected function tearDown(): void
    {
        Mockery::close();
    }

    // Créer un mock
    public function testOrderIsProcessedUsingAMock()
    {
        $payment = new PaymentGateway();
        $double = Mockery::mock(Order::class);
        $double->expects()->process($payment);
        $double->process($payment);
    }

    // Créer un spy
    public function testOrderIsProcessedUsingASpy()
    {
        $payment = new PaymentGateway();
        $spy = Mockery::spy(Order::class);

        $spy->process($payment);
        $spy->shouldHaveReceived("process", [$payment]);
    }
}
