<?php
session_start();
require_once '../vendor/autoload.php';
require_once '../src/routes.php';

$router->run( $router->routes );