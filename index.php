<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

use Core\Router;
use Core\Db;

define('ROOT', __DIR__ .'/');

session_start();

require_once ROOT . '/vendor/autoload.php';
require_once 'config/routes.php';

$dbConn = Db::connect();

$router = new Router;
$router->addRoute($routes);
$router->dispatch();