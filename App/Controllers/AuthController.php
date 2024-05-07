<?php

namespace App\Controllers;

use Exception;
use MF\Controller\Action;
use MF\Model\Container;

session_start();

class AuthController extends Action
{
    public function authenticateLogin(): void
    {
        //consertar o erro do hash aqui =============================
        $email    = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $padrao = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?\/~\\\\|\-]).{8,}$/';

        if($email !== false && preg_match($padrao, $_POST['password'])){

            $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user       = Container::getModel('users');
            $verifyUser = $user->verifyUserExists($email, $password);

            if($verifyUser !== false) {
                $_SESSION['name_user'] = $verifyUser['name'];
                header('Location:/');
            }else{
                echo 'Usuário não encontrado';
            }
        }else{
            echo 'Email ou senha Inválido(s)';
        }
    }

    public function addRegister(): void
    {
        $name  = $_POST['name'];
        $email_verify  = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if($password_hash !== false && $email_verify !== false && !empty($name)){
            Container::getModel('users')->newUser($name, $email_verify, $password_hash);
            header('Location:/cadastro');
            
        }else{
            header('Location:/cadastro?erro=1');
        }
    }

    public function exit(): void
    {
        session_destroy();
        header('Location:/');
    }
}