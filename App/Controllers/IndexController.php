<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action
{
    //chamando o construtor pai para atualizar o carrinho
    public function __construct()
    {
        parent::__construct();
        
        $car = Container::getModel('car');
        $this->view->quantity = $car->getQuantityItems();
        $this->view->tot = $car->getTot();
    }

    public function index()
    {
        $this->render('index');
    }

    public function sobreNos()
    {
        $this->render('sobre_nos');
    }
}