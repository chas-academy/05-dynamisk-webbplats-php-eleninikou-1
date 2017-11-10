<?php

namespace Teorihandbok\Controllers;
use Teorihandbok\Models\PostModel;



class PostController extends AbstractController 
{
    const PAGE_LENGTH = 10;
    
    public function getAllWithPage($page): string
    {
        $page = (int)$page;
        $postModel = new PostModel();

        $posts = $postModel->getAll($page, self::PAGE_LENGTH); 

        $properties = [
            'posts' => $posts,
            'currentPage' => $page,
            'lastPage' => count($posts) < self::PAGE_LENGTH
        ];
        
        return $this->render('./posts.php', $properties);
    }

    public function getAll(): string
    {
        return $this->getAllWithPage(1);
    }

    /*
    public function get($id): string
    {
        $postModel = new PostModel()
        try {
            $post = $postModel->get($id);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'Post not found!'];
            return $this->render('views/error.php', $properties);
        
        $properties = ['post' => $post];
        // I fallet update ska den till admin. 
        return $this->render('views/admin.php', $properties);
    }*/

    public function saveNewPost() {
        
        $newPost = array(
            'title'    => $_POST['title'],
            'body'     => $_POST['body'],
            'category' => $_POST['category'],
            'tags'     => $_POST['tags']
        );

        $saveNewPost = new PostModel;
        $post = $saveNewPost->savePost();
        
        $this->getAll(); // Kan man köra funktionen så?
        
    }

    public function getPostsByCategory($category) 
    {
        $postModel = new PostModel();
        $posts = $postModel->getByCategory($category);
    
        $this->getAll();
    }

    public function getPostsByTag($tag)
    {
        $postmodel = new PostModel();
        $posts = $postModel->getByTag($tag);
        getAll();
    }
    
    public function changePost($id)
    {
        $postModel = new PostModel();
        $posts = $postModel->get($this->id);

        $properties = [
            'title' => $title,
            'body' => $body,
        ];

        return $this->render('views/update.php', $properties);
    }

}

