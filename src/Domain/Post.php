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
    


    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string 
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getText(): string 
    {
        return $this->text;
    }

    public function setText(string $text) 
    {
        $this->text = $text;
    }

    public function getTag(): int 
    {
        return $this->tag;
    }

    public function setTag(int $tag): int 
    {
        $this->tag = $tag;
    }

    public function getCategory(): int 
    {
        return $this->category;
    }

    public function setCategory(int $category): int 
    {
        $this->category= $category;
    }
}