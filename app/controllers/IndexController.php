<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
//        $this->view->disable();
//        echo '<pre>';var_dump($this->session->getOptions());
//        echo "Hello, " . $this->session->get('userName') . "!";

    }

    public function hiAction()
    {
        echo __FILE__ . '<br>' . __METHOD__;
    }

}

