<?php

class SessionController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->title = '登录';
        $this->view->renderJs = '/js/session/index.js';
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
        $account = trim($this->request->getPost('account'));
        $password = trim($this->request->getPost('password'));
        
        $this->view->disable();
        
        $userInfo = Users::findFirstByAccount($account);
        if ( ! $userInfo) {
            $this->response->setJsonContent([
                'code'  => 0,
                'msg'   => '账号不存在或已删除'
            ]);
            return $this->response->send();
        }
        
//         $this->_registerSession([]);
//         return $this->dispatcher->forward([
//             'controller'    => 'index',
//             'action'        => 'index'
//         ]);
    }

}

