<?php
require 'application/lib/dev.php';
require "application/vendor/autoload.php";
use application\core\Router;

spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class) . '.php';
    require_once $path;
    }
);

session_start();

$router = new Router();
$router->run();

