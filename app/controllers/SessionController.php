<?php

class SessionController extends ControllerBase
{
    public function indexAction()
    {

    }

    private function _registerSession($user)
    {
        $sessionInfo = new stdClass();
        $sessionInfo->mes_user_id = 1;
        $sessionInfo->mes_user_name = 'Yu';

        $this->session->set('auth', $sessionInfo);
    }

    public function startAction()
    {
        $this->_registerSession([]);
        return $this->dispatcher->forward([
            'controller'    => 'index',
            'action'        => 'index'
        ]);
    }

}

