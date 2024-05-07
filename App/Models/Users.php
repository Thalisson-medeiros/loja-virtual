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

    public function verifyUserExists(string $email, string $password)
    {
        try{
            $query = 'select name from tb_users where email = ? and pass = ?';
            $stmt = $this->database->prepare($query);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $password);
            $stmt->execute();
            return $stmt->fetch(\PDO::FETCH_ASSOC);       

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }

    public function newUser(string $name, string $email, string $password): void
    {
        try{
            $sql = 'insert into tb_users (name, email, pass) values (?,?,?)';
            $stmt = $this->database->prepare($sql);
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $password);
            $stmt->execute();

        }catch(\PDOException $error){
            echo '<p>'. $error->getMessage() . '</p>';
        }
    }
}