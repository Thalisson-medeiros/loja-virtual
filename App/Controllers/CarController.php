<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class CarController extends Action
{
    public function addItemInTheCar(): void
    {
        $car = Container::getModel('car');
        $car->addItem($_GET['id'], $_GET['name'], $_GET['price']);
        
        $this->updateQuantityAndPriceInTheCar();
        header('Location:/');
    }
}