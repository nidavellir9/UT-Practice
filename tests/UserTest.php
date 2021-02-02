<?php

use \PHPUnit\Framework\TestCase;
use src\User;

class UserTest extends TestCase
{
    protected $user;

    public function setUp(): void
    {
        $this->user = new User();
    }

    public function test_register_name()
    {
        $this->user->setName('Pepito');

        $this->assertEquals($this->user->getName(), 'Pepito');
    }

    public function test_register_lastname()
    {
        $this->user->setLastname('Moneli');

        $this->assertEquals($this->user->getLastname(), 'Moneli');
    }

    public function test_register_email()
    {
        $this->user->setEmail('pepito.moneli@gmail.com');

        $this->assertEquals($this->user->getEmail(), 'pepito.moneli@gmail.com');
    }

    public function test_get_fullname()
    {
        $this->user->setName('Pepito');
        $this->user->setLastname('Moneli');

        $this->assertEquals($this->user->getFullName(), 'Pepito Moneli');
    }

    public function test_get_fullname_empty()
    {
        $this->assertEmpty($this->user->getFullName());
    }

    public function test_get_name_lastname_email_without_spaces()
    {
        $this->user->setName('     Pepito           ');
        $this->user->setLastname('         Moneli         ');
        $this->user->setEmail('       pepito.moneli@gmail.com       ');

        $this->assertEquals($this->user->getName(), 'Pepito');
        $this->assertEquals($this->user->getLastname(), 'Moneli');
        $this->assertEquals($this->user->getEmail(), 'pepito.moneli@gmail.com');
    }
}
?>