<?php

class LoginController extends \Phalcon\Mvc\Controller
{

    public function indexAction($userName)
    {
        $this->session->set('userName', $userName);
    }

}

