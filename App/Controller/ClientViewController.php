<?php
    namespace Controller;
    
    use CoffeeCode\Router\Router;
    use League\Plates\Engine;

    class ClientViewController {
        private Router $router;
        private Engine $view;

        function __construct(?Router $router)
        {
            @session_start();
            $this -> router = $router;
            $this -> view = Engine::create($_SERVER["DOCUMENT_ROOT"]. "/pizzariaweb2/App/View/", "php");
            $this -> view -> addData(["router"=>$router]);
        }

        public function viewLogin(array $data) : void
        {
            echo $this -> view -> render("Client/viewClientLogin", ["title" => "Login - " . PROJECT_NAME]);
        }

    }