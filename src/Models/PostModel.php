<?php

namespace Teorihandbok\Models;

// use Teorihandbok\Domain\Post;
use Teorihandbok\Controllers\PostController;
use PDO;


class PostModel extends AbstractModel  
{
    const CLASSNAME = '\Teorihandbok\Domain\Post';

    public function savePost()
    {
        try {  
            $newPost = array(
                'title'    => $_POST['title'],
                'body'     => $_POST['body'],
                'category' => $_POST['category']
            );

            $query = "INSERT INTO posts (title, body, category) VALUES (:title, :body, :category)";
            $statement = $this->db->prepare($query);

            $statement->bindValue(':title', $newPost['title'], PDO::PARAM_STR); 
            $statement->bindValue(':body', $newPost['body'], PDO::PARAM_STR);
            $statement->bindValue(':category', $newPost['category'], PDO::PARAM_INT); 
            
            $statement->execute();

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }

        $this->savePost_tag();
    
    }

    public function savePost_tag()
    {
        $postID = $this->db->lastInsertId();
        $tags = $_POST['tag'];

        try {
            // Insert postID and tags
            foreach ($_POST['tag'] as $key => &$value) {
                $query = "INSERT INTO post_tags (posts_id, tags_id) VALUES (:post, :tag)";
                $statement = $this->db->prepare($query);
                $statement->bindValue(':post', $postID, PDO::PARAM_INT);
                $statement->bindValue(':tag', $value, PDO::PARAM_INT);
                $statement->execute(); 
            }

            
        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }

    }

    public function get(int $id)
    {
        $query = 'SELECT p.id, p.title, p.body, p.category, c.category_name, c.category_id, t.tag_name
        FROM posts p
        LEFT JOIN post_tags pt ON p.id = pt.posts_id
        LEFT JOIN categories c ON c.category_id = p.category
        LEFT JOIN tags t ON pt.tags_id = t.tag_id WHERE id = :id';
        
        $statement = $this->db->prepare($query);
        $statement->execute([':id' => $id]);

        $posts = $statement->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
        
        return $posts[0];
    }

    public function reallyGetAll()
    {
        $query = 'SELECT p.id, p.title, p.body, c.category_name, p.category
        FROM posts p
        LEFT JOIN categories c ON c.category_id = p.category
        ORDER BY p.id DESC';

        $statement = $this->db->prepare($query);
        $statement->execute();

        $posts = $statement->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME); 
        
        foreach ($posts as $post) {
            $post->setTags($this->getTagsForPostId($post->getId()));
        }
        
        return $posts;
    }

    public function getAll(int $page, int $pageLength): array
    {
        $start = $pageLength * ($page - 1);
        
                $query = 'SELECT p.id, p.title, p.body, c.category_name, p.category
                FROM posts p
                LEFT JOIN categories c ON c.category_id = p.category
                LIMIT :page, :length
                ORDER BY p.id DESC';

                $statement = $this->db->prepare($query);
                $statement->bindParam(':page', $start, PDO::PARAM_INT);
                $statement->bindParam(':length', $pageLength, PDO::PARAM_INT);
                $statement->execute();
        
                $posts = $statement->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME); 

                foreach ($posts as $post) {
                    $post->setTags($this->getTagsForPostId($post->getId()));
                }

                return $posts;
    }

    public function getByCategory (int $category): array
    {
        try {
            $query = 'SELECT p.id, p.title, p.body, c.category_name, p.category
            FROM posts p
            LEFT JOIN categories c ON c.category_id = p.category
            WHERE category = :category
            ORDER BY p.id DESC';

            $statement = $this->db->prepare($query);
            $statement->bindValue(':category', $category, PDO::PARAM_INT);            
            $statement->execute();
            
            $posts = $statement->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);

            foreach ($posts as $post) {
                $post->setTags($this->getTagsForPostId($post->getId()));
            }
            
            return $posts;

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }

    }

    public function getAllCategories(): array
    {
        try {
            
            $query = 'SELECT * FROM categories';

            $statement = $this->db->prepare($query);            
            $statement->execute();
            
            $allCategories = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $allCategories;

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }

    }


    public function getTagsForPostId(int $id) 
    {
        try {

            $query = 'SELECT t.tag_name, t.tag_id 
            FROM tags t
            LEFT JOIN post_tags pt ON pt.tags_id = t.tag_id
            LEFT JOIN posts p ON p.id = pt.posts_id 
            WHERE pt.posts_id = :id';

            $statement = $this->db->prepare($query);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);            
            $statement->execute();
            
            $tags = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $tags;

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }
    }

    public function getAllTags(): array
    {
        try {
            
            $query = 'SELECT * FROM tags';

            $statement = $this->db->prepare($query);            
            $statement->execute();
            
            $allTags = $statement->fetchAll(PDO::FETCH_ASSOC);

            return $allTags;

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }
    }


    public function getByTag($id): array
    {
        try {

            $query = 'SELECT p.id, p.title, p.body, p.category, c.category_name, t.tag_name, t.tag_id
             FROM posts p
             LEFT JOIN post_tags pt ON p.id = pt.posts_id
             LEFT JOIN categories c ON c.category_id = p.category
             LEFT JOIN tags t ON pt.tags_id = t.tag_id
             WHERE tags_id = :tags_id
             ORDER BY p.id DESC';


            $statement = $this->db->prepare($query);
            $statement->execute([':tags_id' => $id]);

            $posts = $statement->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
            
            foreach ($posts as $post) {
                $post->setTags($this->getTagsForPostId($post->getId()));
            }
            
            return $posts;

        } catch (Exception $e) {  

            echo $e->getMessage();
            die();
        }

    }    


    public function getCategoryId() : int
    {
        $category = $_POST['category'];

        $query = "SELECT category_id FROM categories WHERE category_name = :category";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':category', $category); 
        $statement->execute();

        $categoryId = $statement->fetch();
        
        $catid = (int) $categoryId['category_id'];

        return $catid;
    
    }

    public function updatePost()
    {
        $postId = ($_POST['post_id']);

        try { 

            $updatedPost = array(
                'title'    => $_POST['title'],
                'body'     => $_POST['body']
            );

           $categoryId = $this->getCategoryId();


            $query = "UPDATE posts SET title = :title, body = :body, category = :category WHERE id = $postId";
                
            $statement = $this->db->prepare($query);
            $statement->bindValue(':title', $updatedPost['title'], PDO::PARAM_STR); 
            $statement->bindValue(':body', $updatedPost['body'], PDO::PARAM_STR);
            $statement->bindValue(':category', $categoryId, PDO::PARAM_INT);
    
            $statement->execute(); 

        } catch (Exception $e) {  
            $connection->handler->rollBack();     
            echo $e->getMessage();
            die();
        }

        $this->updateTags();

    } 

    public function updateTags()
    {
        $tags = $_POST['tag'];
        $postId = ($_POST['post_id']);

        try {
            // Insert postID and tags
            foreach ($_POST['tag'] as $key => &$value) { 
                $query = "UPDATE post_tags SET tags_id = :tag, posts_id = :post WHERE posts_id = $postId";
                $statement = $this->db->prepare($query);
                $statement->bindValue(':post', $postId, PDO::PARAM_INT);
                $statement->bindValue(':tag', $value, PDO::PARAM_INT);
                $statement->execute(); 
            }
    
            
        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }

    }

    public function deletePost(int $id)
    {   
        try { 
            $query = "DELETE FROM posts WHERE id = :id";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':id', $id);
            $statement->execute(); 

        } catch (Exception $e) {  
            $connection->handler->rollBack();     
            echo $e->getMessage();
            die();
        }
    }


}


