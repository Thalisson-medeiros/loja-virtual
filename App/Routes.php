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

        $route['addItem'] = [
            'route' => '/add_item',
            'controller' => 'CartController',
            'action' => 'addItemInTheCar'
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

        $this->setRoutes($route);
    }
}