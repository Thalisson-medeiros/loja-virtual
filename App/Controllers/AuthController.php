<?php

namespace App\Controllers;
use MF\Controller\Action;
use MF\Model\Container;

session_start();

class AuthController extends Action
{
    public function authenticateLogin(): void
    {
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            
            $user = Container::getModel('users');

            foreach($user->getUsers() as $key => $user){
                if($user['email'] == $_POST['email']){

                    $_SESSION['name_user'] = $user['name'];
                    
                    header('Location:/');
                }
            }
        }else{
            echo 'email não válido!';
        }
    }

    public function exit(): void
    {
        session_destroy();
        header('Location:/');
    }
}