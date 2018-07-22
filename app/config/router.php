<?php
use Phalcon\Mvc\Router;

$router = $di->getRouter();
//Use $_GET['_url'] (default)
//$router->setUriSource(Router::URI_SOURCE_GET_URL);
//Use $_SERVER['REQUEST_URI']
$router->setUriSource(Router::URI_SOURCE_SERVER_REQUEST_URI);

// Define your routes here

$router->handle();
