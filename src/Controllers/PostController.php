<?php

namespace Teorihandbok\Controllers;

use Teorihandbok\Models\PostModel;
use Teorihandbok\Controllers\AbstractController;
use \PDO;

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
        return $this->render('views/posts.php', $properties);
    }

    public function getAll(): string
    {
        return $this->getAllWithPage(1);
    }

    public function get(int $postId): string
    {
        $postModel = new PostModel();

        try {
            $post = $postModel->get($id);
        } catch (\Exception $e) {
            $properties = ['errorMessage' => 'Post not found!'];
            return $this->render('views/error.php', $properties);
        }

        $properties = ['post' => $post];
        // I fallet update ska den till admin. 
        return $this->render('views/admin.php', $properties);
    }

    public function saveNewPost() {
        
        $newPost = array(
            'title'    => $_POST['title'],
            'body'     => $_POST['body'],
            'category' => $_POST['category'],
            'tags'     => $_POST['tags']
        );

        $saveNewPost = new PostModel;
        $post = $saveNewPost->savePost();

        // $saveNewPost->getAll(); Vill hämta alla till book.php 
    
        $properties = [
            'post' => $post,
            'currentPage' => 1,
            'lastPage' => true
        ];
        
        return $this->render('views/posts.php', $properties);
    }

    public function getByCategory() 
    {
        $postModel = new PostModel();
        $posts = $postModel->getByCategory($this->category);
    
            $properties = [
                'post' => $posts,
                'currentPage' => 1,
                'lastPage' => true
            ];
            return $this->render('views/posts.php', $properties);
    }


    public function getCategories()
    {

    }

    
    public function changePost()
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

