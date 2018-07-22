<?php
use Phalcon\Mvc\Controller;

class IndexController extends Controller
{

    public function indexAction()
    {
        $this->view->disable();
        echo "Hello World!";

    }

    public function hiAction()
    {
        echo __FILE__ . '<br>' . __METHOD__;
    }

}

