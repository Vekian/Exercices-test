<?php

use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function testSendMessageReturnsTrue()
    {
        $mailer = new Mailer();
        $this->assertTrue($mailer->sendMessage('test@example.com', 'Test message'));
    }
}
