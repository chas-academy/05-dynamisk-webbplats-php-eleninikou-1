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




/*
$tags = $_POST['tags']

if (empty($tags))
{
    echo $msg = "Du har inte valt några taggar"
}
else 
{
   // Spara taggar   
}

function IsChecked($tags,$value)
{
    if(!empty($_POST[$tags]))
    {
        foreach($_POST[$tags] as $tag)
        {
            if($tag == $value)
            {
                return true;
            }
        }
    }
    return false;
}


}*/
