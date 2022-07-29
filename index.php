<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/pizzariaweb2/vendor/autoload.php");
    
    use CoffeeCode\Router\Router;

    $router = new Router(PROJECT_URL);

    $router -> namespace("Controller");
    
    /** Rotas sem grupo */
    $router -> group(null);
    $router -> get("/", "ApplicationController:home");

    $router -> post("/", "LoginController:validateLogin");    
    $router -> get("/about", "ApplicationController:about");

    /** Rotas do Cliente */
    $router -> group("cliente");
    $router -> get("/", "ApplicationController:clientHome");
    $router -> get("/purchaseHistory", "ApplicationController:history");
    $router -> post("/comprar/", "PizzaController:validarCompra");
    $router -> get("/logout", "LoginController:logout");
    $router -> get("/gerarPdf", "ApplicationController:gerarPdf");


    /** Erro */
    $router -> group("ops");
    $router -> get("/{errcode}", "ApplicationController:error");

    $router -> dispatch();

    if ($router -> error()){
        $router -> redirect("/ops/{$router -> error()}");
    }

