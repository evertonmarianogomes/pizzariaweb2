<?php
    namespace Controller;
    use CoffeeCode\Router\Router;
    use League\Plates\Engine;
    
    class ErrorController 
    {
        private Router $router;
        private Engine $view;

        function __construct(?Router $router = null)
        {
            @session_start();
            $this -> router = $router;
            $this -> view = Engine::create($_SERVER["DOCUMENT_ROOT"]. "/pizzariaweb2/App/View/", "php");
            $this -> view -> addData(["router"=>$router]);
        }


        public function viewError (array $data) : void
        {
            echo $this->view->render("Error/viewError", ["title" => "Erro - Pizzaria Web 2", "errcode" => $data["errcode"]]);
        }
    }