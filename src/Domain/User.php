<?php

namespace Teorihandbok\Domain;

class User
{
    protected $id;
    protected $firstname;
    protected $surname;
    protected $email;
    

    public function __construct($id, $firstname, $surname, $email)
    {
        $this->id         = $id;
        $this->firstname  = $firstname;
        $this->surname    = $surname;
        $this->email      = $email;
    }


    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
