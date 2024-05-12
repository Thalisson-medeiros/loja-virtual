<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class CartController extends Action
{
    public function addItemInTheCart(): void
    {
        $cart = Container::getModel('cart');
        $cart->addItem($_GET['id'], $_GET['name_product'], $_GET['price'], $_GET['image'],$_GET['user']);

        $data = array(
            'status' => 'ok'
        );

        echo json_encode($data);
    }

    //passar o id da primary key
    public function removeItem(): void
    {
        $cart = Container::getModel('cart');

        if($cart->remove($_GET['id_item']) !== null){
            $response = ['status' => 'ok'];
        }else{
            $response = ['status' => 'error'];
        }
        echo json_encode($response);
    }

    public function updateCart(): void
    {
        //verificando se o usuario esta logado ou não
        $this->validateLogin();

        $cart = Container::getModel('cart');
        $quantity = $cart->getQuantity($_SESSION['id']);

        if($quantity !== null){
            $response = ['status' => 'ok', 'quantity' => $quantity, 'array' => $cart->getItems($_SESSION['id'])];
        }else{
            $response = ['status' => 'error'];
        }
        
        echo json_encode($response);
    }
}