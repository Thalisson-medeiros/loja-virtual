<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

session_start();

class AuthController extends Action
{
    public function login(): void
    {
        $user = Container::getModel('users');
        $verifiedUser = $user->authenticateLogin($_POST['email'], $_POST['password']);

        $login = match($verifiedUser){
            1 => 'Campo email Inválido',
            2 => 'Senha Deve conter: letras maiúsculas , minúsculas , caracteres especiais ex: * - ! e ter no minimo 8 caracteres',
            3 => 'Usuário não encontrado',
            default => 'ok'
        };

        if($login === 'ok'){
            $_SESSION['username'] = $verifiedUser;
        }else{
            header('Location:/login?erro='.$login);
        }
    }

    public function register(): void
    {
        $user = Container::getModel('users');
        $verifyRegister = $user->newUser($_POST['name'], $_POST['email'], $_POST['password']);
        
        $register = match($verifyRegister){
            1 => 'Campo email Inválido',
            2 => 'Senha Deve conter: letras maiúsculas , minúsculas , caracteres especiais ex: * - ! e ter no minimo 8 caracteres',
            3 => 'Campo nome não pode estar Vazio e deve ter no minimo 3 caracteres.',
            default => 'ok'
        };

        if($register === 'ok'){
            header('Location:/');
        }else{
            header('Location:/cadastro?erro='.$register);
        }
    }

    public function exit(): void
    {

        session_destroy();
        header('Location:/');
   
    }
}