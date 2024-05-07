<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action
{
    public function index(): void
    {
        $products = Container::getModel('products');
        $this->view->allProducts = $products->getProducts();
        $this->render('index');
    }

    public function sobreNos(): void
    {
        $this->render('sobre');
    }

    public function produto(): void
    {
        $product = Container::getModel('products');
        $this->view->product = $product->getProduct($_GET['id'], $_GET['produto']);
        $this->render('produto');
    }

    public function login(): void
    {
        $this->render('login');
    }

    public function cadastro(): void
    {
        $this->render('cadastro');
    }
}