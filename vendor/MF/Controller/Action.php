<?php

namespace MF\Controller;
use MF\Model\Container;

//aqui irão ficar as abstrações dos controllers
abstract class Action
{
    protected $view;

    public function __construct()
    {
        $this->view = new \stdClass;
        //o carrinho inicia vazio
        $this->view->quantity = 0;
        $this->view->total = 0;
        $this->updateQuantityAndPriceInTheCar();
    }

    //metodo para atualizar o valor e a quantidade no carrinho
    protected function updateQuantityAndPriceInTheCar()
    {
        $car = Container::getModel('car');
    
        //id do usuario vem de uma session
        $idUsuario = 5;

        $this->view->total = $car->getTotal($idUsuario);
        $this->view->quantity = $car->getQuantity($idUsuario);
    }

    protected function render(string $view, string $layout = 'layout'): void
    {
        $this->view->page = $view;

        if(file_exists("../App/Views/". $layout .".phtml")){
            require_once "../App/Views/". $layout .".phtml";
        }else{
            $this->content();
        }
    }

    protected function content(): void
    {
        $className = str_replace('App\\Controllers\\', '', get_class($this));
        $className = strtolower(str_replace('Controller', '', $className));

        require_once "../App/Views/". $className . "/" . $this->view->page . ".phtml";
    }

    
}