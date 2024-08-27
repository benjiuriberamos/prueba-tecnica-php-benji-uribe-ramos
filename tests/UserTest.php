<?php

use PHPUnit\Framework\TestCase;
use App\User;

class UserTest extends TestCase {

    public function testUserCanBeCreated() {
        $user = new User("Test test", "test@test.pe", "admin");

        $this->assertEquals("Test test", $user->getName());
        $this->assertEquals("test@test.pe", $user->getEmail());
        $this->assertTrue(password_verify("admin", $user->getPassword()));
    }

    public function testUserNameCanBeUpdated() {
        $user = new User("Benji Uribe Ramos", "benjiuriberamos@gmail.com", "somepassword");
        $this->assertEquals("Benji Uribe Ramos", $user->getName());
    }

}