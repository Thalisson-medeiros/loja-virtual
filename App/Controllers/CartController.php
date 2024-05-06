<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class CartController extends Action
{
    public function addItemInTheCart(): void
    {
        $cart = Container::getModel('cart');
        $cart->addItem($_GET['id'], $_GET['name_product'], $_GET['price'], $_GET['image']);

        $data = array(
            'status' => 'ok'
        );

        echo json_encode($data);
    }
}