<?php

namespace App\Models;
use MF\Model\Model;

class Users extends Model
{
    public function getUsers(): array
    {
        try{
            $query = 'select id_user, name, pass, email from tb_users';
            $stmt  = $this->database->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);       

        }catch(\PDOException $error){
            return null;
        }
    }

    public function getUserName(string $email): string
    {
        try{
            $query = 'select name from tb_users where email = ?';
            $stmt  = $this->database->prepare($query);
            $stmt->bindValue(1, $email);
            $stmt->execute();
            //o fetchColumn retorna diretamente o valor sem precisar do fetchall, fetch
            return $stmt->fetchColumn();       

        }catch(\PDOException $error){
            return null;
        }
    }

    public function getUserPassword(string $email): string
    {
        try{
            $query = 'select pass from tb_users where email = ?';
            $stmt  = $this->database->prepare($query);
            $stmt->execute();
            return $stmt->fetchColumn();       

        }catch(\PDOException $error){
            return null;
        }
    }

    public function newUser(string $name, string $email, string $password): int | bool
    {
        $emailVerified = filter_var($email, FILTER_VALIDATE_EMAIL);
        $pattern       = '/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_])(?!.*\s).{8,}$/';

        if($emailVerified === false){
            return 1;
        }else if(!preg_match($pattern, $password) || empty($password)){
            return 2;
        }else if(empty($name) || strlen(str_replace(' ','',$name)) < 3){
            return 3;
        }else{
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            
            try{

                $sql  = 'insert into tb_users (name, email, pass) values (?,?,?)';
                $stmt = $this->database->prepare($sql);
                $stmt->bindValue(1, $name);
                $stmt->bindValue(2, $emailVerified);
                $stmt->bindValue(3, $password_hash);
                $stmt->execute();
                return true;

            }catch(\PDOException $error){
                return null;
            }
        }
    }

    public function authenticateLogin(string $email, string $password): int | bool
    {   
        $emailVerified  = filter_var($email, FILTER_VALIDATE_EMAIL);
        $pattern        = '/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_])(?!.*\s).{8,}$/';

        if($emailVerified === false){
            return 1;
        }else if(preg_match($pattern, $password) === false){
            return 2;
        }else{
            $passwordDb     = $this->getUserPassword($emailVerified);
            $verifyPassword = password_verify($password, $passwordDb);

            if($verifyPassword !== false){
                return $this->getUserName($emailVerified);
            }else{
                return 3;
            }
        }
    }
}