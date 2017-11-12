<?php

namespace Teorihandbok\Models;

use Teorihandok\Domain\User;
use \PDO;

class UserModel extends AbstractModel
{
    const CLASSNAME = '\Teorihandbok\Domain\User';

    public function getByEmail(string $email): array
    {
        $query = 'SELECT * FROM user WHERE email = :user';
        $statement = $this->db->prepare($query);
        $statement->execute(['user' => $email]);

        $row = $statement->fetch();

        if (empty($row)) {
            throw new NotFoundException();
        }
        
        $user = [
            'id' => $row['id'],
            'firstname' => $row['firstname'],
            'surname' => $row['surname'],
            'email' => $row['email']
        ];
 
        return $user;
        
    }
}
