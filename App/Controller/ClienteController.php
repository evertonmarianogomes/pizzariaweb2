<?php
    namespace Controller;
    require_once($_SERVER["DOCUMENT_ROOT"]."/pizzariaweb2/vendor/autoload.php");

    use Exception;
    use Model\ClienteDao;

    class ClienteController {

        public function selectAllClients() : Array{
            return (new ClienteDao) -> selectAll();
        }

        public function selectClientByIdLogin(int $idLogin) : Array{
            $clienteDao = new ClienteDao();
            $clienteDao -> __set("idLogin", $idLogin);
            return $clienteDao -> selectByIdLogin();
        }

        public function insertClient($data) : void{
            print_r($data);
            try{
                $loginData = (new LoginController) -> createLogin($data["loginUsuario"], $data["passwordUsuario"]);
            } catch(Exception $e){
                $_SESSION["mensagens"]["erro"] = $e -> getMessage();
                header("Location: ". url("administrativo/criarConta"));
            }
        }
    }