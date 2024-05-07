<?php

namespace App\Controllers;
use MF\Controller\Action;
use MF\Model\Container;

session_start();

class AuthController extends Action
{
    public function authenticateLogin(): void
    {
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

        //implementar um método em users para cadastrar usuario
        //implementar um método para recuperar a senha e comparar aqui
        $password = $_POST['password'];

        if($email && $password) {
            
            $user = Container::getModel('users');

            foreach($user->getUsers() as $key => $user){
                if($user['email'] == $_POST['email'] && $_POST['password'] == $user['password']){

                    $_SESSION['name_user'] = $user['name'];
                    
                    header('Location:/');
                }
            }
        }else{
            echo 'Email ou Senha inválido(s)';
        }
    }

    public function register(): void
    {
        $name  = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = Container::getModel('users')->register();
        
        //continuar daqui............
    }

    public function exit(): void
    {
        session_destroy();
        header('Location:/');
    }
}