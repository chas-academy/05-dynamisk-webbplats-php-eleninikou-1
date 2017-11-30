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

        $user = $statement->fetch();

        if (empty($user)) {
            return $errormessage = ['errormessage' => 'Du loggar in med din email!'];
        }
        
        $user = [
            'id' => $user['id'],
            'firstname' => $user['firstname'],
            'surname' => $user['surname'],
            'email' => $user['email']
        ];
 
        return $user;
        
    }
}
