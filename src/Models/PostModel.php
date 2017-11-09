<?php

namespace Teorihandbok\Models;

use Teorihandbok\Domain\Book;
//use Teorihandbok\Exceptions\DbException;
//use Teorihandbok\Exceptions\NotFoundException;
use PDO;


class PostModel extends AbstractModel  // Får connection
{
    const CLASSNAME = '\Teorihandbok\Domain\Post';

    public function savePost()
    {
        
        try {  
            // Insert to Post
            $query = "INSERT INTO posts (title, body, category, tag) VALUES (:title, :body, :category, :tags)";
            $statement = $this->db->prepare($query);

            $statement->bindValue(':title', $newPost['title'], PDO::PARAM_STR); 
            $statement->bindValue(':body', $newPost['body'], PDO::PARAM_STR);
            $statement->bindValue(':category', $newPost['category'], PDO::PARAM_INT);
            $statement->bindValue(':tags', $newPost['tags'], PDO::PARAM_INT);

            $postID = $this->db->lastInsertId();

            // Insert postID and category
            $query = "INSERT INTO post_category (posts_id, categories_id) VALUES (:post, :category)";
            $statement = $this->db->prepare($query);
            $statment->bindValue(':post', $postID, PDO::PARAM_INT);
            $statment->bindValue(':category', $newPost['category'], PDO::PARAM_INT); // Samma namn som ID - fusk?

            // Insert postID and tags
            $query = "INSERT INTO post_tags (posts_id, tags_id) VALUES (:post, :tags)";
            $statement = $this->db->prepare($query);
            $statement->bindValue(':post', $postID, PDO::PARAM_INT);
            foreach($tags as $tag) {
                $statement->bindValue(':tags', $tag, PDO::PARAM_INT);
            }


            $statement->execute(); // ? Vilken av de ?
            $this->db->handler->commit();
       
        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }

    }

    public function getByCategory (int $category): array
    {
        try {

            $query = "SELECT posts.title, posts.body
            from posts
            join post_category
               on posts.category = post_category.categories_id
            where categories_id = $category";

            $statement = $this->db->prepare($query);
            $statement->bindValue(':category', $new_post['category']);

            return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }
    }

    public function getByTags(int $tag): array
    {
        try {
            
            $query = "SELECT posts.title, posts.body
            from posts
            join post_tag
               on posts.tag = post_tag.tag_id
            where tag_id = $tag";

            $statement = $this->db->prepare($query);
            $statement->bindValue(':tag', $new_post['tag']);


            return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);

        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }

    }

    public function getAll(int $page, int $pageLength): array
    {
        $start = $pageLength * ($page - 1);
        
                $query = 'SELECT * FROM posts LIMIT :page, :length';
                $sth = $this->db->prepare($query);
                $sth->bindParam('page', $start, PDO::PARAM_INT);
                $sth->bindParam('length', $pageLength, PDO::PARAM_INT);
                $sth->execute();
        
                return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }

    public function get(int $id): Post
    {
        $query = 'SELECT * FROM posts WHERE id = :id';
        $sth = $this->db->prepare($query);
        $sth->execute(['id' => $id]);

        $books = $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
        if (empty($posts)) {
            //throw new NotFoundException();
        }

        return $posts[0];

    public function updatePost()
    {
        try { 

            $query = "UPDATE posts SET title = "$title", body = "$body", category = "$category", tag = "$tags" WHERE id = $id";
            //UPDATE posts SET title = "snälla", body = "fungera" WHERE id = 24; -> fungerar.
            
            $statement = $this->db->prepare($query);
            $statement->execute(); 

        } catch (Exception $e) {  
            //$connectino->handler->rollBack():     
            echo $e->getMessage();
            die();
        }
    }

    public function deletePost(int $id)
    {   
        // Query fungerar.
        $query = "DELETE FROM posts WHERE id = $id";
    }


}


