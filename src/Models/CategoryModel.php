<?php

public function getAllWithinCategory (int $category)
    {
        $category = $_POST['category'];

        try {
            require './Core/connection.php';

            $query = "SELECT * FROM posts WHERE category = $category";

            $statement = $connection->prepare($query);
            $statement->bindValue(':category', $new_post['category']);


            // Join för att slå ihop tabeller.
            $query = "SELECT CONCAT()
            AS 
            FROM post_categories pc
            LEFT JOIN posts p ON pc.posts_id = p.id
            LEFT JOIN category c on p.id = pc.id"; 
        
        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }
    }

?>