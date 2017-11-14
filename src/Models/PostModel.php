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
        $query = 'SELECT * FROM posts WHERE id = :id';
        $statement = $this->db->prepare($query);
        $statement->execute([':id' => $id]);

        $posts = $statement->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
        
        return $posts[0];
    }

    public function reallyGetAll()
    {
        $query = 'SELECT p.id, p.title, p.body, c.category_name, t.tag_name
        FROM posts p
        LEFT JOIN post_tags pt ON p.id = pt.posts_id
        LEFT JOIN categories c ON c.category_id = p.category
        LEFT JOIN tags t ON pt.tags_id = t.tag_id';

        $statement = $this->db->prepare($query);
        $statement->execute();
        return $posts = $statement->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME); 
    }

    public function getAll(int $page, int $pageLength): array
    {
        $start = $pageLength * ($page - 1);
        
                $query = 'SELECT p.id, p.title, p.body, c.category_name, t.tag_name
                FROM posts p
                LEFT JOIN post_tags pt ON p.id = pt.posts_id
                LEFT JOIN categories c ON c.category_id = p.category
                LEFT JOIN tags t ON pt.tags_id = t.tag_id
                LIMIT :page, :length';

                $statement = $this->db->prepare($query);
                $statement->bindParam(':page', $start, PDO::PARAM_INT);
                $statement->bindParam(':length', $pageLength, PDO::PARAM_INT);
                $statement->execute();
        
                return $posts = $statement->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME); 
    }

    public function getByCategory (int $category): array
    {
        try {
        
            $query = 'SELECT p.id, p.title, p.body, p.category, c.category_name, t.tag_name, t.tag_id
             FROM posts p
             LEFT JOIN post_tags pt ON p.id = pt.posts_id
             LEFT JOIN categories c ON c.category_id = p.category
             LEFT JOIN tags t ON pt.tags_id = t.tag_id
             WHERE category = :category';


            $statement = $this->db->prepare($query);
            $statement->bindValue(':category', $category, PDO::PARAM_INT);            
            $statement->execute();
            
            $posts = $statement->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);

            return $posts;

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
            
            $tags[] = $statement->fetchAll(PDO::FETCH_ASSOC);

            var_dump($tags);
            die();

            return $tags;

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }
    }


    public function getByTag(int $tagId): array
    {
        try {

            $query = 'SELECT p.id, p.title, p.body, p.category, c.category_name, t.tag_name, t.tag_id
             FROM posts p
             LEFT JOIN post_tags pt ON p.id = pt.posts_id
             LEFT JOIN categories c ON c.category_id = p.category
             LEFT JOIN tags t ON pt.tags_id = t.tag_id
             WHERE tags_id = :tags_id';


            $statement = $this->db->prepare($query);
            $statement->execute([':tags_id' => $tagId]);
            $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
            
             return $posts;

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }

    }    

    public function updatePost(int $id)
    {

        try { 
            $newPost = array(
                'title'    => $_POST['title'],
                'body'     => $_POST['body'],
                'category' => $_POST['category']
            );

            $query = "UPDATE posts SET (title, body, category) VALUE (:title, :body, :category) WHERE id = $id";
            //UPDATE posts SET title = "snälla", body = "fungera" WHERE id = 24; -> fungerar.
            
            $statement = $this->db->prepare($query);
            $statement->bindValue(':title', $newPost['title'], PDO::PARAM_STR); 
            $statement->bindValue(':body', $newPost['body'], PDO::PARAM_STR);
            $statement->bindValue(':category', $newPost['category'], PDO::PARAM_INT);
    
            $statement->execute(); 

        } catch (Exception $e) {  
            $connection->handler->rollBack();     
            echo $e->getMessage();
            die();
        }

        $this->updateTags();

    } 

    public function updateTags(int $id)
    {
        $tags = $_POST['tag'];

        try {
            // Insert postID and tags
            foreach ($_POST['tag'] as $key => &$value) {
                $query = "UPDATE post_tags SET (posts_id, tags_id) VALUES (:post, :tag)";
                $statement = $this->db->prepare($query);
                $statement->bindValue(':post', $id, PDO::PARAM_INT);
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
            $query = "DELETE FROM posts WHERE id = $id";
            $statement->execute(); 

        } catch (Exception $e) {  
            $connection->handler->rollBack();     
            echo $e->getMessage();
            die();
        }
        
    }


}


