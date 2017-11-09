<?php

namespace Teorihandbok\src\Domain;

class Posts {

    private $id;
    private $title;
    private $body;
    private $tag;
    private $category;
   
        public function __construct(
            int $id,
            string $title, 
            string $body,
            int $tag,
            int $category
        ){ 
            $this->id       = $id;
            $this->title    = $title;
            $this->body     = $body;
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

        public function getBody(): string 
        {
            return $this->body;
        }

        public function setBody(string $body)
        {
            $this->body = $body;
        }

        public function setTag(int $tag)
        {
            $this->tag = $tag;
        }

        public function setCategory(int $category)
        {
            $this->Category = $Category;
        }

}