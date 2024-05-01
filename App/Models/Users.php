<?php

namespace App\Models;
use MF\Model\Model;

class Users extends Model
{
    public function getUser(): array
    {
        $query = '
            select id, nome, email from tb_usuarios
        ';

        $stmt = $this->database->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}