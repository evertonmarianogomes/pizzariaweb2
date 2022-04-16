<?php
    namespace Controller;
    use CoffeeCode\Router\Router;
    use League\Plates\Engine;

    abstract class GenericController
    {
        protected Router $router;
        protected Engine $view;

        function __construct(?Router $router = null, string $viewLocation)
        {
            @session_start();
            $this -> router = $router;
            $this -> view = Engine::create($_SERVER["DOCUMENT_ROOT"]. "/pizzariaweb2/App/" . $viewLocation . "/", "php");
            $this -> view -> addData(["router"=>$router]);   
        }

        /** Função que verifica se existe uma sessão de usuário ou não
         * @param bool $isAdmin Define se o usuário é um administrador (Default Value: true)
         * @param bool $isExists Define se a função vai procurar uma sessão existente ou não (Valor padrão: true).
         */
        protected function verifyUserSession (bool $isAdmin = true, bool $isExists = true) : void
        {
            if ($isAdmin) {
                if ($isExists && (isset($_SESSION["user"] -> id))) {
                    $this->router->redirect("app.home");
                    return;
                } else if (!$isExists && (!isset($_SESSION["user"] -> id))) {
                    $_SESSION["messages"] = message("Somente usuários autenticados podem acessar esse endereço", "Error");
                    $this->router->redirect("app.login");
                    return;
                }
            } else {
                $this -> verifyUserSessionClient(true);
            }
        }


        private function verifyUserSessionClient (bool $isExists = true) : void
        {

        }
    }