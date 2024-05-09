<?php
//arquivo para configurar as rotas do framework

namespace App;
use MF\Init\Bootstrap;

class Routes extends Bootstrap
{
    protected function initRoutes(): void
    {
        $route['home'] = [
            'route' => '/',
            'controller' => 'IndexController',
            'action' => 'index'
        ];

        $route['produto'] = [
            'route' => '/produto',
            'controller' => 'IndexController',
            'action' => 'produto'
        ];

        $route['sobre'] = [
            'route' => '/sobre',
            'controller' => 'IndexController',
            'action' => 'sobreNos'
        ];

        $route['login'] = [
            'route' => '/login',
            'controller' => 'IndexController',
            'action' => 'login'
        ];

        $route['addRegister'] = [
            'route' => '/addRegister',
            'controller' => 'authController',
            'action' => 'register'
        ];

        $route['cadastro'] = [
            'route' => '/cadastro',
            'controller' => 'IndexController',
            'action' => 'cadastro'
        ];

        $route['authenticate'] = [
            'route' => '/authLogin',
            'controller' => 'AuthController',
            'action' => 'login'
        ];

        $route['addItem'] = [
            'route' => '/add_item',
            'controller' => 'CartController',
            'action' => 'addItemInTheCart'
        ];

        $route['updateCart'] = [
            'route' => '/updateCart',
            'controller' => 'CartController',
            'action' => 'updateNumberOfItemsInTheCart'
        ];

        $route['exit'] = [
            'route' => '/sair',
            'controller' => 'AuthController',
            'action' => 'exit'
        ];

        $this->setRoutes($route);
    }
}