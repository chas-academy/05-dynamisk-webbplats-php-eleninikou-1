<?php

class Posts {

    private $id;
    private $title;
    private $text;
    private $tag;
    private $category;
   
    public function __construct(
        int $id,
        string $title, 
        string $text,
        int $tag,
        int $category
    ){ 
        $this->id       = $id;
        $this->title    = $title;
        $this->text     = $text;
        $this->tag      = $tag;
        $this->category = $category;
    }
    
}