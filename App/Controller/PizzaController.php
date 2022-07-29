<?php
    namespace Controller;
    require_once($_SERVER["DOCUMENT_ROOT"]."/pizzariaweb2/vendor/autoload.php");

    use League\Plates\Extension\RenderContext\FuncArgs;
    use Model\HistoricoDao;
    use Model\PizzaDao;
    use DateTime;
    use DateTimeZone;

    class PizzaController {
        
        public function selectAllPizzas() : Array{
            return (new PizzaDao) ->selectAll();
        }

        public function selectPizzaById(int $idPizza) : Array{
            $pizzaDao = new PizzaDao();
            $pizzaDao -> __set("id", $idPizza);
            return $pizzaDao -> selectById();
        }

        public function validarCompra($data) : void{
            session_start();
            $pizzaDao = new PizzaDao();
            $historicoDao = new HistoricoDao();
            $pizzaDao -> __set("id", $data["saborPizza"]);
            $pizzaData = $pizzaDao ->selectById();
            $valorTotal = $pizzaData[0] -> precoUnitario * $data["quantidadePizza"];
            $date = new DateTime();
            
            $date -> setTimezone((new DateTimeZone("America/Campo_Grande")));
            
            if ($pizzaData != null) {
                $historicoDao -> __set("saborPizza", $pizzaData[0] -> sabor);
                $historicoDao -> __set("qtdPizza", (int) $data["quantidadePizza"]);
                $historicoDao -> __set("valorTotal", (Double) $valorTotal);
                $historicoDao -> __set("createdAt" , $date->format('Y-m-d H:i:s'));
                $historicoDao -> __set("idCliente", (int) $_SESSION["clientUserSession"]["idCliente"]);
                $historicoDao -> insert();
                $_SESSION["mensagens"]["sucesso"] = "Pedido efetuado com sucesso, o seu pedido será entregue no seu endereço em até 1:30h";
            }
            header("Location: " . url("cliente/"));
        }


    }