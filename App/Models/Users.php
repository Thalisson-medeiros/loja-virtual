<?php

namespace App\Models;
use MF\Model\Model;

class Users extends Model
{
    public function getUsers(): array
    {
        $query = 'select id_user, name, pass, email from tb_users';

        $stmt = $this->database->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}