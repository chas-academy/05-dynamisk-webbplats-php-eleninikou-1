<?php

namespace Teorihandbok\Models;

use Teorihandok\Domain\User;
use \PDO;

class UserModel extends AbstractModel
{
    const CLASSNAME = '\Teorihandbok\Domain\User';

    
    public function get(int $userId): User
    {
        $query = 'SELECT * FROM user WHERE id = :id';
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $Id]);

        $row = $statement->fetch();
        if (empty($row)) {
            throw new NotFoundException();
        }
        
        $user = (
            $row['id'],
            $row['firstname'],
            $row['surname'],
            $row['email']
        );
    }

    public function getByEmail(string $email): User
    {
        $query = 'SELECT * FROM user WHERE email = :user';
        $statement = $this->db->prepare($query);
        $statement->execute(['user' => $email]);

        $row = $statement->fetch();

        if (empty($row)) {
            throw new NotFoundException();
        }

        $user = (
            $row['id'],
            $row['firstname'],
            $row['surname'],
            $row['email']
        );

        return $user;
        
    }
}
