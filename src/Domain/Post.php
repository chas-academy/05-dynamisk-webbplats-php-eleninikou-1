<?php

namespace Teorihandbok\Domain;

class Post {

    private $id;
    private $title;
    private $body;
    private $tags; 
    private $category;

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

    public function getBody(): string 
    {
        return $this->body;
    }

    public function setBody(string $body)
    {
        $this->body = $body;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }

    public function getCategory(): int 
    {
        return $this->category;
    }

    public function setCategory(int $category)
    {
        $this->category = $category;
    }

}