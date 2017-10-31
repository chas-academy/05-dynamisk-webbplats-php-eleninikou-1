<?php

namespace Teorihandbok\Domain;

class Users
{
    private $id;
    private $name;
    private $lastName;
    private $email;
    private $password;


    public function __create (
        $name,
        $lastname,
        $email,
        $password
    ){
        $this ->name = $name;
        $this ->lastname = $lastname;
        $this ->email = $email;
        $this ->password = $password;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->email;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getPassword(): string
    {
        return $this->password;
    }


} 


?>