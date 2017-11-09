<?php

public function getAllWithinCategory (int $category)
    {
        $category = $_POST['category'];

        try {
            require './Core/connection.php';

            $query = "SELECT posts.title, posts.body
            from posts
            join post_category
               on posts.category = post_category.categories_id
            where categories_id = $category";

            $statement = $connection->prepare($query);
            $statement->bindValue(':category', $new_post['category']);

            

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }
    }

?>