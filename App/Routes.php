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
            'controller' => 'CarController',
            'action' => 'addItemInTheCar'
        ];

        $route['sobre'] = [
            'route' => '/sobre_nos',
            'controller' => 'IndexController',
            'action' => 'sobreNos'
        ];

        $this->setRoutes($route);
    }
}