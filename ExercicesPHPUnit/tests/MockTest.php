<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        // Créer un mock de la fonction mailer
        // Implémenter dans ce mock la methode sendMessage et la faire retourner true
        // Tester naivement que la méthode du mock retourne true
        // Utiliser le mock de phpunit ou de mockery pour tester que la méthode sendMessage est appelée
        $mailer = Mockery::mock(Mailer::class);

        $mailer->expects()
        ->sendMessage('test@example.com', 'Test message')
        ->once()
        ->andReturn(true);
        $this->assertTrue($mailer->sendMessage('test@example.com', 'Test message'));
    }
}
