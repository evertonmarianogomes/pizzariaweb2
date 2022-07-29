<?php
    namespace Controller;
    require_once($_SERVER["DOCUMENT_ROOT"]."/pizzariaweb2/vendor/autoload.php");


    use Exception;
    use Model\LoginDao;

    class LoginController {

        public function __construct(){
            session_start();
        }
        /** Função que encripta uma senha com Whirlpool e SHA-512 
         * @param String $password String com a senha que vai ser protegida
         * @return String Retorna uma String com a senha encriptada
        */
        private function encriptPassword (String $password) : String{
            return hash("whirlpool", $password);
        }

        public function logout() : void{
            
            unset($_SESSION["clientUserSession"]);
            $_SESSION["mensagens"]["sucesso"] = "Usuário desconectado com sucesso";
            header("Location: /pizzariaweb2/");
            exit(0);
        }


        private function createSession(Object $usuario) : void{
            print_r($usuario);
            $_SESSION["clientUserSession"] = [
                "idLogin" => $usuario -> idLogin,
                 "idUsuario" => $usuario -> idUsuario, 
                 "idCliente" => $usuario -> idCliente, 
                 "nome" => $usuario -> nome, 
                 "sobrenome" => $usuario -> sobrenome, 
                 "email" => $usuario -> emailUsuario, 
                 "telefone" => $usuario -> telefone,
                 "endereco" => $usuario -> endereco
            ];
            header("Location: " . url("cliente"));
        }

        public function validateLogin(Array $data) : void{
            try {
                $login = filter_var($data["loginUsuario"], FILTER_SANITIZE_SPECIAL_CHARS);
                $password = $this -> encriptPassword(filter_var($data["passwordUsuario"], FILTER_SANITIZE_SPECIAL_CHARS));

                $loginData = $this -> selectLogin($login, $password);

                if (! empty ($loginData)) {
                    $usuario = (new ClienteController) -> selectClientByIdLogin($loginData[0] -> id);
                    if (!empty($usuario)) {
                        
                        $this -> createSession($usuario[0]);
                    }
                } else {
                    throw new Exception("Usuário e/ou senha incorretos. Tente novamente");
                }
                
                
            } catch(Exception $e){
                $_SESSION["mensagens"]["erro"] = $e -> getMessage();
                header("Location: /pizzariaweb2/");
                exit();
            }
            
        }

        public function selectLogin(String $login, String $password) : Array{
            $loginDao = new LoginDao();
            $loginDao -> __set("login", $login);
            $loginDao -> __set("password", $password);
            return $loginDao -> selectByLoginPassword();
        }

        private function selectByLogin(String $login) : Array{
            $loginDao = new LoginDao();
            $loginDao -> __set("login", $login);            
            return $loginDao -> selectByLoginPassword();
        }

        public function createLogin(String $login, String $password){
            $login = filter_var($login, FILTER_SANITIZE_SPECIAL_CHARS);
            $password = $this -> encriptPassword(filter_var($password, FILTER_SANITIZE_SPECIAL_CHARS));

            if (!empty ($this -> selectByLogin($login))) {
                return new Exception("Esse login já esta sendo usado");
            } else {
                $loginDao = new LoginDao();
                $loginDao -> __set("login", $login);
                $loginDao -> __set("password", $password);
                $loginDao -> insert();

                return $this -> selectByLogin($loginDao -> __get("login"));
            }
        }
    }

?>