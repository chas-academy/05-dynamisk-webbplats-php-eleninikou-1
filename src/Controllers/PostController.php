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
        
        return $this->render('.views/posts.php', $properties);
    }

    public function getAll(): string
    {
        return $this->getAllWithPage(1);
    }

    public function saveNewPost() {
        
        $saveNewPost = new PostModel;
        $posts = $saveNewPost->savePost();
        $allposts = $saveNewPost->reallyGetAll();
        
        $this->getAll();

        $properties = [
            'posts' => $allposts,
            'currentPage' => 1,
            'lastPage' => true
        ];

        return $this->render('views/posts.php', $properties);
    }

    public function getPostsByCategory($category) 
    {
        $postModel = new PostModel();
        $posts = $postModel->getByCategory($category);
        $this->getAll();

        $properties = [
            'posts' => $posts,
            'currentPage' => 1,
            'lastPage' => true
        ];
        return $this->render('views/posts.php', $properties);
    }

    public function getPostsByTag($tag)
    {
        $postmodel = new PostModel();
        $postModel->getByTag($tag);
        $this->getAll();

        $properties = [
            'posts' => $posts,
            'currentPage' => 1,
            'lastPage' => true
        ];
        return $this->render('views/posts.php', $properties);
    }
    
    public function update($id)
    {
        $postModel = new PostModel();
        $postModel->updatePost();
        $this->getAll();

    }

    public function delete($id)
    {
        $postModel = new PostModel();
        $postModel->deletePost();
        $this->getAll();

    }

}

