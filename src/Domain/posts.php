<?php 

namespace Teorihandbok\Domain;

use \PDO;
    
    function save() {
       
       require_once '../Core/Econnection.php';
        
       
        try {            
            $newPost = array(
                'title'    => $_POST['title'],
                'body'     => $_POST['body'],
                'category' => $_POST['category'],
                'tag'      => $_POST['tag']
            );

            $tags = $_POST['tag'];
            $query = "INSERT INTO posts (title, body, category, tag) VALUES (:title, :body, :category, :tag)";
            
            $statement = $connection->prepare($query);

            $statement->bindValue(':title', $newPost['title'], PDO::PARAM_STR); 
            $statement->bindValue(':body', $newPost['body'], PDO::PARAM_STR);
            $statement->bindValue(':category', $newPost['category'], PDO::PARAM_INT);
            /* $statement->bindValue(':tag', $newPost['tag'], PDO::PARAM_INT); */
            
            foreach($tags as $tag) {
                $statement->bindValue(':tag', $tag, PDO::PARAM_INT);
            } 

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }

        $statement->execute();

       // try {
       //     $postID = $connection->lastInsertId();
       //     
       //     // Insert postID and category
       //     $query = "INSERT INTO post_category (posts_id, categories_id) VALUES (:post, :category)";
       //     $statement = $connection->prepare($query);
       //     
       //     $statment->bindValue(':post', $postID, PDO::PARAM_INT);
       //     $statment->bindValue(':category', $newPost['category'], PDO::PARAM_INT); 

       //     $statement->execute();
       //     
       // } catch (Exception $e) {       
       //     echo $e->getMessage();
       //     die();
       // }

       // try {

       //      // Insert postID and tags
       //      $query = "INSERT INTO post_tags (posts_id, tags_id) VALUES (:post, :tags)";
       //      $statement = $connection->prepare($query);
       //      $statement->bindValue(':post', $postID, PDO::PARAM_INT);
       //      foreach($tags as $tag) {
       //          $statement->bindValue(':tags', $tag, PDO::PARAM_INT);
       //     }
       //     $statement->execute();
       //     
       // } catch (Exception $e) {       
       //     echo $e->getMessage();
       //     die();
       // }
    }
    save();
    header("location: ../../views/admin.php");





    // public function editPost()
    // {
    //     // Redigerar inlägg
    // }

    // public function deletePost()
    // {
    //     // Raderar inlägg   
    // }

    // public function showAllPost()
    // {
    //     $query('SELECT * FROM posts');
    //     $statement = $connection->prepare($query);
    //     $statement->execute();
    // }
