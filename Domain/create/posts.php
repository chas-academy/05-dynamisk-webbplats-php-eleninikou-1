<?php 

//FÖr att komma åt funktionen select category
include '/category.php';

class NewPosts {

    //parameters

    private $id;
    public $title;
    public $text;
    public $tag;
    public $category;
   
    public function __construct(
        $title, 
        $text,
        $tag,
        $category
        ){
        $this->title = $title;
        $this->text = $text;
        $this->tag = $tag;
        $this->category = $category;
    }

    //metoderna

    

    public function createPost() 
    {
        // Skapar inlägg
    }

    public function editPost()
    {
        // För att redigera inlägg
    }

    public function deletePost()
    {
        //För att radera inlägg   
    }


}


//POST

$title = $_POST = ['title']
$text = $_POST = ['text']


?>