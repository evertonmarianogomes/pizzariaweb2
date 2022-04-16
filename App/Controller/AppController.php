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

        private function verifyUserSession (bool $isExists = false) : void 
        {
            if ($isExists) {
                if(isset($_SESSION["user"] -> id)) {
                    $this->router->redirect("app.admin.home");
                    exit();
                }
            } else {
                if(!isset($_SESSION["user"] -> id)) {
                    $_SESSION["messages"] = message("Somente usuários autenticados podem acessar esse endereço", "Error");
                    $this->router->redirect("app.admin.login");
                    exit();
                }
            }
        }


        public function logoutUser(array $data) : void
        {
            unset($_SESSION["user"]);
            $_SESSION["messages"] = message("Usuário desconectado com sucesso", "Success");
            $this -> router ?-> redirect("app.admin.login");
        }

        public function viewLogin() : void 
        {
            $this->verifyUserSession(true);

            echo $this -> view -> render("viewLogin", ["title" => "Login - " . PROJECT_NAME]);
        }
        

        public function viewHome(array $data) : void
        {
            $this->verifyUserSession();
            echo $this -> view -> render("viewHome", ["title" => "Home - " . PROJECT_NAME]);
        }
    }