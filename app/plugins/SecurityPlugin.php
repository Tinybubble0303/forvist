<?php

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;

class SecurityPlugin extends Plugin
{
    /**
     * @param Event $event
     * @param Dispatcher $dispatcher
     * @return bool
     */
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
            $auth = $this->session->get('auth');
            if (is_null($auth) || ! $auth->mes_user_id) {
                $dispatcher->forward([
                    'controller'    => 'session',
                    'action'        => 'index'
                ]);

                return false;
            }

            $users = Users::findFirst($auth->mes_user_id);
            if ( ! $users || ! $users->getStatus()) {
                $dispatcher->forward([
                    'controller'    => 'session',
                    'action'        => 'index'
                ]);

                return false;
            }
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

}