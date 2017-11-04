<?php

namespace Teorihandbok\Domain;

class Category
{
    private $id;
    private $name;

    public function __construct (
        string $name,
        int $id
    ){
        $this->name = $name;
        $this->id   = $id;
    }


    public function getId(): int 
    {
        return $this->id;
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function setName(string $name): string
    {
        $this->name = $name;
    }

}


?>