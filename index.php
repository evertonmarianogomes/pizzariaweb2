<?php
    require_once(__DIR__ . "/vendor/autoload.php");

    use CoffeeCode\Router\Router;

    $router = new Router(PROJECT_URL);

    $router->namespace("Controller");

    $router -> group(null);

    $router -> get("/", "AppController:viewLogin", "app.login");
    $router -> get("/home", "AppController:viewHome", "app.home");
    
    $router -> post("/login", "LoginController:validateLogin", "app.validateLogin");


    $router->dispatch();

    if ($router->error()) {
        echo "Ocorreu um erro: ". $router->error();
    }