'<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testReturnsFullName()
    {
        $user = new User('test@example.com');
        $user->first_name = 'John';
        $user->surname = 'Doe';

        $this->assertSame('John Doe', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User('test@example.com');

        $this->assertSame('', $user->getFullName());
    }

    /**
     * @description("Nous pouvons aussi définir les attributs des méthodes de test en utilisant l'annotation @test ou l'attribut #[Test] plutôt que de préfixer la méthode par le mot test.")
     **/
    #[Test]
    public function userHasFirstName()
    {
        $user = new User('test@example.com');
        $user->first_name = 'Jane';

        $this->assertSame('Jane', $user->first_name);
    }

    public function testNotificationIsSent()
    {
        $mailerMock = Mockery::mock(Mailer::class);
        $user = new User("test@example.com");
        $user->setMailer($mailerMock);
        $mailerMock->expects()
        ->send("test@example.com", 'Hello, world!')
        ->once();
        $user->notify('Hello, world!');
    }

    public function testCannotNotifyUserWithNoEmail()
    {
        $this->expectException(InvalidArgumentException::class);

        $user = new User(null);
        $mailer = new Mailer();
        $user->setMailer($mailer);
        $user->notify('Hello, world!');
    }

    /**
     * @runInSeparateProcess
     *
     * @preserveGlobalState disabled
     *
     * @description("les annotations @runInSeparateProcess et @preserveGlobalState sont utilisées pour exécuter un test dans un processus séparé et pour désactiver la préservation de l'état global respectivement.")
     */
    public function testNotifyReturnsTrue()
    {
        $mailerMock = Mockery::mock(Mailer::class);
        $user = new User("test@example.com");
        $user->setMailer($mailerMock);
        $mailerMock->expects()
        ->send("test@example.com", 'Hello, world!')
        ->once()
        ->andReturn(true);

        $result = $user->notify('Hello, world!');
        $this->assertTrue($result);
    }
}
