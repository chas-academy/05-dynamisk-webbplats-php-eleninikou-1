<?php

namespace Teorihandbok\Controllers;

use Teorihandbok\Models\PostModel;



class PostController extends AbstractController 
{
    const PAGE_LENGTH = 10;
    
    public function getAllPosts() {
        $allPosts = new PostModel;
        $allPosts->reallyGetAll();

        $properties = [
            'posts' => $allPosts
        ];

        return $this->render('views/posts.php', $properties);
    }

    public function saveNewPost() {
        
        $saveNewPost = new PostModel;
        $saveNewPost->savePost();
        $allPosts = $saveNewPost->reallygetAll();

        $properties = [
            'posts' => $allPosts
        ];

        $this->redirect('admin', $properties);   
    }

    public function toCreate()
    {
        $properties = [];
        return $this->render('views/admin.php', $properties);
    }

    public function getPostsByCategory($category) 
    {
        $postModel = new PostModel();
        $posts = $postModel->getByCategory($category);

        $properties = [
            'posts' => $posts,
            
        ];

        if (!isset($_COOKIE['user'])) {
            return $this->render('views/posts.php', $properties);
        } else {
            return $this->render('views/adminposts.php', $properties);
        }
    }

    public function getPostsByTag($id)
    {
       
            $postModel = new PostModel;
            $posts = $postModel->getByTag($id);

            $properties = [
                'posts' => $posts
            ];
            
            if (!isset($_COOKIE['user'])) {
                return $this->render('views/posts.php', $properties);
            } else {
                return $this->render('views/adminposts.php', $properties);
            }

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
        $updated = $postModel->updatePost($_POST['post_id'], $_POST['category'], $_POST['tag']);
        $posts = $postModel->reallygetAll();

        $properties = [
            'posts' => $posts
        ];

        $this->redirect('admin', $properties);
        
    }

    public function delete()
    {
        
        $postModel = new PostModel();
        $postModel->deletePost($_POST['post_id']);
        
        $posts = $postModel->reallygetAll();
        
            $properties = [
                'posts' => $posts
            ];
    
            $this->redirect('admin', $properties);
       
    }

}

