<?php 

namespace Teorihandbok\Domain;

use PDO;
    
    save();

    function save() {
       
       require_once '../Core/database.php';
        
        try {            
            $new_post = array(
                'title'    => $_POST['title'],
                'body'     => $_POST['body'],
                'category' => $_POST['category'],
                'tags'     => $_POST['tags']
            );
    
            print_r($new_post);

            $query = "INSERT INTO posts (title, body, post_category, post_tag) VALUES (:title, :body, :category, :tags)";
            //The query returns a PDO statement as a string
            $statement = $connection->prepare($query);

            $statement->bindValue(':title', $new_post['title'], PDO::PARAM_STR); 
            $statement->bindValue(':body', $new_post['body'], PDO::PARAM_STR);
            $statement->bindValue(':category', $new_post['category'], PDO::PARAM_INT);
            $statement->bindValue(':tags', $new_post['tags'], PDO::PARAM_INT);

            $statement->execute();

            
        } catch (Exception $e) {       
            //getMessage method from exception model
            echo $e->getMessage();
            die();
        }

    }





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
