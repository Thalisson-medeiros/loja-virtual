<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class CarController extends Action
{
    public function addItemToCar()
    {
        $car = Container::getModel('car');
        $car->add($_GET['id'], $_GET['name'], $_GET['preco']);
        
        // $this->render('index');
    }
}