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
        
        return $this->render('views/posts.php', $properties);
    }

    public function getAll(): string
    {
        return $this->getAllWithPage(1);
    }

    public function saveNewPost() {
        
        $saveNewPost = new PostModel;
        $allposts = $saveNewPost->reallyGetAll();

        $properties = [
            'posts' => $allposts,
            'currentPage' => 1,
            'lastPage' => true
        ];

        $saveNewPost->savePost($properties);

        return $this->render('views/posts.php', $properties);
    
        
    }

    public function getPostsByCategory($category) 
    {
        $postModel = new PostModel();
        $posts = $postModel->getByCategory($category);
        
        //$tags = $postModel->getTagsForPostId();

        $properties = [
            'posts' => $posts,
            //'tags'  => $tags
        ];
        return $this->render('views/posts.php', $properties);
    }

    public function getPostsByTag($tag)
    {
        $postModel = new PostModel;
        $posts = $postModel->getByTag($tag);

        $properties = [
            'posts' => $posts
        ];
        return $this->render('views/posts.php', $properties);
    }
    
    public function getToUpdate($id)
    {
        $postModel = new PostModel();
        $post = $postModel->get($id);
        $tags = $postModel->getTagsForPostId($id);
        $allTags = $postModel->getAllTags();

        $properties = [
            'post' => $post,
            'tags' => $tags,
            'allTags' => $allTags
        ];

        return $this->render('views/update.php', $properties);

    }

    public function updatePost($id)
    {
        $postModel = new PostModel();
        $postModel->updatePost($id);
        $allposts = $postModel->getAll();

        $properties = [
            'posts' => $allposts,
            'currentPage' => 1,
            'lastPage' => true
        ];

        return $this->render('/views/posts.php', $properties);
    }

    public function delete($id)
    {
        $postModel = new PostModel();
        $postModel->deletePost($id);
        $posts = $postModel->reallyGetAll();

        $properties = [
            'posts' => $posts
        ];
        return $this->render('views/posts.php', $properties);
       
    }

}

