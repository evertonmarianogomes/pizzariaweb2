<?php
    require_once(__DIR__ . "/vendor/autoload.php");

    use CoffeeCode\Router\Router;

    $router = new Router(PROJECT_URL);

    $router->namespace("Controller");

    $router -> group(null);

    $router -> get("/", "AppController:viewMain");

    $router->dispatch();

    if ($router->error()) {
        echo "Ocorreu um erro: ". $router->error();
    }