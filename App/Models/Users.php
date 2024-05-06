<?php

namespace App\Models;
use MF\Model\Model;

class Users extends Model
{
    public function getUser(): array
    {
        $query = '
            select id_user, name, pass from tb_users
        ';

        $stmt = $this->database->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}