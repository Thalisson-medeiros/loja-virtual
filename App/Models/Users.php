<?php

namespace App\Models;
use MF\Model\Model;

class Users extends Model
{
    public function getUsers(): array
    {
        try{
            $query = 'select id_user, name, pass, email from tb_users';

            $stmt = $this->database->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);       

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }

    public function newUser(): void
    {
        $username = $_POST['name'];
        $email =    $_POST['email'];
        $password = $_POST['password'];

        try{
               

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }
}