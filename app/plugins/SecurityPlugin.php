<?php

use Phalcon\Acl;
use Phalcon\Acl\Role;
use Phalcon\Acl\Adapter\Memory as AclList;
use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;

class SecurityPlugin extends Plugin
{

    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        $controllerName = $dispatcher->getControllerName();
        $actionName     = $dispatcher->getActionName();
        $route = strtolower($controllerName . ':' . $actionName);

        //check user is login or not.
        $noSecurityRoutes = self::getNoSecurityRoutes();
        if (in_array($route, $noSecurityRoutes)) {
            //nothing to do
        } else {
            $users = Users::findFirst(['user_id' => 1]);
            var_dump($users);exit;

            $auth = $this->session->get('auth');
            if (is_null($auth) || ! $auth->mes_user_id) {
                $dispatcher->forward([
                    'controller'    => 'session',
                    'action'        => 'index'
                ]);

                return false;
            }


            $users = Users::findFirst(['user_id' => 1]);
            var_dump($users);exit;
        }

        //check user can access the url or not.
        $noAclRoutes = self::getNoAclRoutes();
        if (in_array($route, $noAclRoutes)) {
            //nothing to do
        } else {

        }

    }

    private static function getNoSecurityRoutes()
    {
        return ['session:index', 'session:start'];
    }

    private static function getNoAclRoutes()
    {
        return ['session:index', 'session:start'];
    }

    private function getAcl()
    {
        $acl = new AclList();
        $acl->setDefaultAction(Acl::DENY);

        $roles = [
            'users' => new Role('Users'),
            'guest' => new Role('Guest'),
        ];
        foreach ($roles as $role) {
            $acl->addRole($role);
        }
        
    }

}