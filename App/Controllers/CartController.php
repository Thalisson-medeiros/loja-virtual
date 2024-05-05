<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class CartController extends Action
{
    public function addItemInTheCar(): void
    {
        $car = Container::getModel('cart');
        $car->addItem($_GET['id']);

        $data = array(
            'status' => 'ok'
        );

        echo json_encode($data);
        
        //$this->updateQuantityAndPriceInTheCar();
    }

    //metodo para atualizar o valor e a quantidade no carrinho
    protected function updateQuantityAndPriceInTheCar()
    {
        $cart = Container::getModel('cart');
    
        //id do usuario vem de uma session
        $idUsuario = 5;

        $this->view->total = $cart->getTotal($idUsuario);
        $this->view->quantity = $cart->getQuantity($idUsuario);
    }
}