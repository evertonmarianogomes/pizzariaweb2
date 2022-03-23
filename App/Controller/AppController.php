<?php
    namespace Controller;
    use CoffeeCode\Router\Router;
    use League\Plates\Engine;
    
    class AppController {
        private Router $router;
        private Engine $view;

        function __construct(?Router $router)
        {
            @session_start();
            $this -> router = $router;
            $this -> view = Engine::create($_SERVER["DOCUMENT_ROOT"]. "/pizzariaweb2/App/View/", "php");
            $this -> view -> addData(["router"=>$router]);
        }


        public function viewLogin() : void 
        {
            
            echo $this -> view -> render("viewLogin", ["title" => PROJECT_NAME]);
        }
    }