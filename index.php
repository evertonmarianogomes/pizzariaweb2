<?php
    require_once(__DIR__ . "/vendor/autoload.php");

    use CoffeeCode\Router\Router;

    $router = new Router(PROJECT_URL);

    $router->namespace("Controller");

    $router->group("admin");

    $router->get("/", "AppController:viewLogin", "app.admin.login");
    $router->get("/home", "AppController:viewHome", "app.admin.home");
    $router->get("/logout", "AppController:logoutUser", "app.admin.logout");
    
    $router->post("/login", "LoginController:validateLogin", "app.admin.validateLogin");

    $router->dispatch();

    if ($router->error()) {
        echo "Ocorreu um erro: " . $router->error();
    }
