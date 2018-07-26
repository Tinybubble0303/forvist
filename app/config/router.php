<?php
use Phalcon\Mvc\Router;

$router = $di->getRouter();
$router->setUriSource(Router::URI_SOURCE_SERVER_REQUEST_URI);

// Define your routes here

$router->handle();
