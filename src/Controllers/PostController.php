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
        $saveNewPost->savePost();
        $allposts = $saveNewPost->reallyGetAll();

        $properties = [
            'posts' => $allposts,
            'currentPage' => 1,
            'lastPage' => true
        ];

        return $this->render('views/adminposts.php', $properties);
    
        
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

    public function getPostsByTag($id)
    {
       
            $postModel = new PostModel;
            $posts = $postModel->getByTag($id);

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
        $allCategories = $postModel->getAllCategories();

        $properties = [
            'post' => $post,
            'tags' => $tags,
            'allTags' => $allTags,
            'allCategories' => $allCategories
        ];

        return $this->render('views/update.php', $properties);

    }

    public function updatePost()
    {
        $postModel = new PostModel();
        $updated = $postModel->updatePost($_POST['post_id'], $_POST['category']);
        $posts = $postModel->reallyGetAll();

        $properties = [
            'posts' => $posts
        ];

        return $this->render('views/adminposts.php', $properties);
    }

    public function delete()
    {
        
        $postModel = new PostModel();
        $postModel->deletePost($_POST['post_id']);
        
        $posts = $postModel->reallyGetAll();
        
            $properties = [
                'posts' => $posts
            ];
    
            return $this->render('views/adminposts.php', $properties);
       
    }

}

