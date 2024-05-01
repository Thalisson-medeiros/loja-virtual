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

        $route['car'] = [
            'route' => '/car',
            'controller' => 'CarController',
            'action' => 'addItemToCar'
        ];

        $route['sobre'] = [
            'route' => '/sobre_nos',
            'controller' => 'IndexController',
            'action' => 'sobreNos'
        ];

        $this->setRoutes($route);
    }
}