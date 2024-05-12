'<?php

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    public function tearDown() :void
    {
        Mockery::close();
    }

    public function testReturnsFullName() {
    }

    public function testFullNameIsEmptyByDefault() {
    }


    /**
     * @description("Nous pouvons aussi définir les attributs des méthodes de test en utilisant l'annotation @test ou l'attribut #[Test] plutôt que de préfixer la méthode par le mot test.")
     **/
    #[Test]
    public function user_has_first_name() {
    }

    public function testNotificationIsSent() {
    }

    public function testCannotNotifyUserWithNoEmail() {
    }


    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @description("les annotations @runInSeparateProcess et @preserveGlobalState sont utilisées pour exécuter un test dans un processus séparé et pour désactiver la préservation de l'état global respectivement.")
     */
    public function testNotifyReturnsTrue(){
    }
}