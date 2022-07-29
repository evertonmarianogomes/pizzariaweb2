<?php
    namespace Controller;

    use Dompdf\Dompdf;
    use League\Plates\Engine;
    use Model\HistoricoDao;
    use PHPMailer\PHPMailer\PHPMailer;

    use DateTime;

    class ApplicationController {
        private $view;

        public function __construct(){
            session_start();
            $this -> view = Engine :: create($_SERVER["DOCUMENT_ROOT"]."/pizzariaweb2/App/View", "php");
        }
        /** Funções de Login e Criar conta */
        
        public function home($data) : void{
            if (isset($_SESSION["clientUserSession"]["idCliente"])) {
                header("Location: " . url("cliente"));
                exit();
            }

            echo $this -> view -> render("viewIndex", [
                "title" => "Pizzaria Web 2"
            ]);            
        }

        public function about($data) : void{
            echo $this -> view -> render("viewSobre", [
                "title" => "Sobre | Pizzaria Web 2"
            ]);   
        }
        /** Funções do Cliente */
        private function redirectIsNotLogged() : void{
            if (!isset($_SESSION["clientUserSession"]["idCliente"])) {
                $_SESSION["mensagens"]["erro"] = "Somente usuários autenticados podem acessar esse endereço";
                header("Location: " . url());
                exit();
            }
        }

        public function clientHome($data) : void{
            $this -> redirectIsNotLogged();
            
            // Carregando as pizzas disponíveis
            $pizzas = (new PizzaController) -> selectAllPizzas();
            echo $this -> view -> render("cliente/viewHomeCliente", [
                "title" => "Home | Pizzaria Web 2",
                "usuario" => $_SESSION["clientUserSession"],
                "pizzas" => $pizzas
            ]); 
        }

        public function history ($data){
            $this -> redirectIsNotLogged();
            $historicoDao = new HistoricoDao();
            $historicoDao -> __set("idCliente", (int) $_SESSION["clientUserSession"]["idCliente"]);
            $historico = $historicoDao -> selectAll();

            echo $this -> view -> render("cliente/viewHistoricoCliente", [
                "title" => "Histórico de Compras | Pizzaria Web 2",
                "usuario" => $_SESSION["clientUserSession"],
                "historico" => $historico
            ]);
        }

        public function gerarPdf($data){
            $id = (int) $_GET["id"];
            $historicoDao = new HistoricoDao();
            $historicoDao -> __set("id", (int) $id);
            $historicoDao -> __set("idCliente", (int) $_SESSION["clientUserSession"]["idCliente"]);
            $historico = $historicoDao -> selectByID();
            
            if (empty($historico)) {
                header("Location: ". url("cliente/"));
            }

            ob_start();

            echo $this -> view -> render("cliente/viewNotaFiscal", [
                "title" => "Histórico de Compras | Pizzaria Web 2",
                "historicoAtual" => $historico
            ]);

            $domPdf = new Dompdf(["enable_remote" => true]);
            $domPdf -> loadHtml(ob_get_clean());
            $domPdf -> setPaper("A4");
            $domPdf -> render();

            $domPdf -> stream("notaFiscal.pdf", ["Attachment" => false]);
        }

        /** Erros da aplicação */

        public function error(Array $data): void{
            echo $this -> view -> render("viewError",[
                "title" => "Erro | Pizzaria Web 2",
                "errorCode" => $data["errcode"]
            ]);
        }
    }