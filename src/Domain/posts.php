<?php 

namespace Teorihandbok\Domain;

use \PDO;
    
    function save() {
       
       require_once '../Core/connection.php';
        
        try {            
            $newPost = array(
                'title'    => $_POST['title'],
                'body'     => $_POST['body'],
                'category' => $_POST['category'],
                'tags'     => $_POST['tags']
            );

            $query = "INSERT INTO posts (title, body, category, tag) VALUES (:title, :body, :category, :tags)";
            //The query returns a PDO statement as a string
            $statement = $connection->prepare($query);

            $statement->bindValue(':title', $newPost['title'], PDO::PARAM_STR); 
            $statement->bindValue(':body', $newPost['body'], PDO::PARAM_STR);
            $statement->bindValue(':category', $newPost['category'], PDO::PARAM_INT);
            $statement->bindValue(':tags', $newPost['tags'], PDO::PARAM_INT);

            $statement->execute();

            
        } catch (Exception $e) {       
            //getMessage method from exception model
            echo $e->getMessage();
            die();
        }
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
