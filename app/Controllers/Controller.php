<?php
namespace App\Controllers;

class Controller{

    /**
     * @var \Twig_Environment
     */
    public $view;

    function __construct(){
        $this->createView();
    }

    protected function createView(){
        $loader = new \Twig_Loader_Filesystem(__DIR__."/../../views");
        $this->view =  new \Twig_Environment($loader);
        $this->view->addGlobal('user', (isset($_SESSION['user']))?$_SESSION['user']:false);
    }


    public function render($view, $data = array()){
        echo $this->view->render($view, $data);
        return true;
    }

}