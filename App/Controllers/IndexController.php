<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action
{
    public function index()
    {
        $products = Container::getModel('products');
        $this->view->allProducts = $products->getProducts();
        $this->render('index');
    }

    public function sobreNos()
    {
        $this->render('sobre');
    }

    public function produto()
    {
        $product = Container::getModel('products');
        $this->view->product = $product->getProduct($_GET['id'], $_GET['produto']);
        $this->render('produto');
    }
}