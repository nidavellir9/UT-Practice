<?php

namespace src;

class User
{
    protected $name;
    protected $lastname;
    protected $email;

    public function setName($name): void
    {
        $this->name = trim($name);
    }

    public function setLastname($lastname): void
    {
        $this->lastname = trim($lastname);
    }

    public function setEmail($email): void
    {
        $this->email = trim($email);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFullName(): string
    {
        //return $this->name . ' ' . $this->lastname;
        return trim("$this->name $this->lastname");
    }
}
?>