<?php

namespace Teorihandbok\Domain;

class Tags 
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


}

