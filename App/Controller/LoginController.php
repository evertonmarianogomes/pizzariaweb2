<?php
    namespace Controller;

    use Model\LoginDao;
    use CoffeeCode\Router\Router;

    class LoginController
    {

        private Router $router;

        public function __construct(?Router $router = null)
        {
            @session_start();
            $this->router = $router;
        }


        private function redirect(string $message = ""): void
        {
            $_SESSION["messages"] = message($message, "Error");
            $this->router?->redirect("app.login");
            exit();
        }

        private function createUserSession($user, LoginDao $login, string $route = "/home")
        {
            $loginData = $login?->fetch()?->data();



            $_SESSION["user"] = (object) array(
                "id" => $user -> id,
                "first_name" => $user->first_name,
                "last_name" => $user->last_name,
                "login"=>$loginData -> login,
                "idLogin" => $loginData->id
            );
    
            $_SESSION["messages"] = message("Bem vindo {$user->first_name} {$user->last_name}");
            $this -> router -> redirect($route);
        }

        public function validateLogin(array $data): void
        {

            $login = filter_var($data["login"], 515);
            $password = hash("whirlpool", filter_var($data["password"], 515));

            $loginDao = new LoginDao();

            $login_data = $loginDao->find("login=:login AND password=:password", http_build_query(["login" => $login, "password" => $password]));


            if ($loginDao->fail()) {
                $this->redirect("Ocorreu um erro ao executar a Query: " + $login?->fail()->getMessage());
            } else if ($loginDao->fetch() != null) {
                $user = $loginDao?->user()?->fetch()?->data();
                if ($user != null) {
                    $this->createUserSession($user, $login_data, (isset($data["redirect"])?$data["redirect"]:"app.home"));

                    echo "Usuário encontrado no BD";
                } else {
                    $this->redirect("Usuário não encontrado no Banco de Dados");
                }
            } else {
                $this->redirect("Usuário e/ou senha incorretos");
            }
        }
    }
