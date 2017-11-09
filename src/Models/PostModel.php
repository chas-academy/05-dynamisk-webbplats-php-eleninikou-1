<?php

namespace Teorihandbok\Models;

use Teorihandbok\Domain\Book;
use Teorihandbok\Exceptions\DbException;
use Teorihandbok\Exceptions\NotFoundException;
use PDO;


class PostModel extends AbstractModel  
{
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

            $postID = $connection->lastInsertId();

            // Insert postID and category
            $query = "INSERT INTO post_category (posts_id, categories_id) VALUES (:post, :category)";
            $statement = $connection->prepare($query);
            $statment->bindValue(':post', $postID, PDO::PARAM_INT);
            $statment->bindValue(':category', $newPost['category'], PDO::PARAM_INT); // Samma namn som ID - fusk?

            // Insert postID and tags
            $query = "INSERT INTO post_tags (posts_id, tags_id) VALUES (:post, :tags)";
            $statement = $connection->prepare($query);
            $statement->bindValue(':post', $postID, PDO::PARAM_INT);
            foreach($tags as $tag) {
                $statement->bindValue(':tags', $tag, PDO::PARAM_INT);
            }


            $statement->execute(); // ? Vilken av de ?
            $connection->handler->commit();
       
        } catch (Exception $e) {       
            echo $e->getMessage();
            die();
        }
    }

    public function updatePost()
    {
        //$id = valt inlägg.
        try {  

            require './Core/connection.php';

            $query = "UPDATE posts SET title = "$title", body = "$body", category = "$category", tag = "$tags" WHERE id = $id";
            //UPDATE posts SET title = "snälla", body = "fungera" WHERE id = 24; -> fungerar.
            
            $statement = $connection->prepare($query);
            $statement->execute(); 

        } catch (Exception $e) {  
            //$connectino->handler->rollBack():     
            echo $e->getMessage();
            die();
        }
    }


    public function deletePost()
    {
        $query = "DELETE FROM posts WHERE id = $id; "
    }



}




/*
namespace Bookstore\Models;

use Bookstore\Domain\Book;
use Bookstore\Exceptions\DbException;
use Bookstore\Exceptions\NotFoundException;
use PDO;

class BookModel extends AbstractModel
{
    const CLASSNAME = '\Bookstore\Domain\Book';

    public function get(int $bookId): Book
    {
        $query = 'SELECT * FROM books WHERE id = :id';
        $sth = $this->db->prepare($query);
        $sth->execute(['id' => $bookId]);

        $books = $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
        if (empty($books)) {
            throw new NotFoundException();
        }

        return $books[0];
    }

    public function getAll(int $page, int $pageLength): array
    {
        $start = $pageLength * ($page - 1);

        $query = 'SELECT * FROM books LIMIT :page, :length';
        $sth = $this->db->prepare($query);
        $sth->bindParam('page', $start, PDO::PARAM_INT);
        $sth->bindParam('length', $pageLength, PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }

    public function search(string $title, string $author): array
    {
        $query = <<<SQL
SELECT * FROM books
WHERE title LIKE :title AND author LIKE :author
SQL;
        $sth = $this->db->prepare($query);
        $sth->bindValue('title', "%$title%");
        $sth->bindValue('author', "%$author%");
        $sth->execute();

        return $sth->fetchAll(PDO::FETCH_CLASS, self::CLASSNAME);
    }
}
*/
