<?php

namespace Teorihandbok\Models;
use Teorihandbok\Domain\Post;
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
                'category' => $_POST['category'],
                'tag'      => $_POST['tag']
            );

            // Insert to Post
            $query = "INSERT INTO posts (title, body, category, tag) VALUES (:title, :body, :category, :tag)";
            $statement = $this->db->prepare($query);

            $statement->bindValue(':title', $newPost['title'], PDO::PARAM_STR); 
            $statement->bindValue(':body', $newPost['body'], PDO::PARAM_STR);
            $statement->bindValue(':category', $newPost['category'], PDO::PARAM_INT);
            $statement->bindValue(':tag', $newPost['tag'], PDO::PARAM_INT);
        
            $statement->execute(); 

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }


    }

    public function savePost_category()
    {
        $postID = $this->db->lastInsertId();
        $newPost = array(
            'title'    => $_POST['title'],
            'body'     => $_POST['body'],
            'category' => $_POST['category'],
            'tag'      => $_POST['tag']
        );

        try {
          
            // Insert postID and category
            $query = "INSERT INTO post_category (posts_id, categories_id) VALUES (:post, :category)";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':post', $postID, PDO::PARAM_INT);
            $statement->bindValue(':category', $newPost['category'], PDO::PARAM_INT); 

            $statement->execute(); 

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }
    }

    public function savePost_tag()
    {
        $postID = $this->db->lastInsertId();
        $newPost = array(
            'title'    => $_POST['title'],
            'body'     => $_POST['body'],
            'category' => $_POST['category'],
            'tag'      => $_POST['tag']
        );

        try {
            // Insert postID and tags
            $query = "INSERT INTO post_tags (posts_id, tags_id) VALUES (:post, :tag)";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':post', $postID, PDO::PARAM_INT);
            $statement->bindValue(':tag', $newPost['tag'], PDO::PARAM_INT);
            
            $statement->execute();     
            
        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }

    }

    public function get(int $id): Post
    {
        $query = 'SELECT * FROM posts WHERE id = :id';
        $statement = $this->db->prepare($query);
        $statement->execute([':id' => $id]);

        $posts = $statement->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
        
        return $posts[0];
    }

    public function reallyGetAll()
    {
        $query = 'SELECT * FROM posts';
        $statement = $this->db->prepare($query);

        $statement->execute();
        return $posts = $statement->fetchAll(); 
    }

    public function getAll(int $page, int $pageLength): array
    {
        $start = $pageLength * ($page - 1);
        
                $query = 'SELECT * FROM posts LIMIT :page, :length';
                $statement = $this->db->prepare($query);
                $statement->bindParam(':page', $start, PDO::PARAM_INT);
                $statement->bindParam(':length', $pageLength, PDO::PARAM_INT);
                $statement->execute();
        
                return $posts = $statement->fetchAll(); 
    }

    public function getByCategory (int $category): array
    {
        try {
            $query = 'SELECT *
            FROM posts
            WHERE category = :category';

            $statement = $this->db->prepare($query);
            $statement->execute([':category' => $category]);
        

            //   Vrf fungerar ej fetchAll? --------------------------------------------------------  //
           
            $posts = $statement->fetchAll();
            // PDOStatement::fetchAll — Returns an array containing all of the result set rows

            return $posts;

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }

    }

    public function getByTag(int $tag): array
    {
        try {

            $query = "SELECT *
            FROM posts
            WHERE tag = :tag";

            $statement = $this->db->prepare($query);
            $statement->execute([':tag' => $tag]);

            $posts = $statement->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);

            return $posts; 

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }

    }    

    public function updatePost(int $id)
    {

        try { 
            $query = "UPDATE posts SET (title, body, category, tag) VALUE (:title, :body, :category, :tag) WHERE id = $id";
            //UPDATE posts SET title = "snälla", body = "fungera" WHERE id = 24; -> fungerar.
            
            $statement = $this->db->prepare($query);
            $statement->bindValue(':title', $newPost['title'], PDO::PARAM_STR); 
            $statement->bindValue(':body', $newPost['body'], PDO::PARAM_STR);
            $statement->bindValue(':category', $newPost['category'], PDO::PARAM_INT);
            $statement->bindValue(':tag', $newPost['tag'], PDO::PARAM_INT);
            $statement->execute(); 

        } catch (Exception $e) {  
            $connection->handler->rollBack();     
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


