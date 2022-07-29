<?php
    namespace Controller;
    require_once($_SERVER["DOCUMENT_ROOT"]."/pizzariaweb2/vendor/autoload.php");
    use Model\CarrinhoDao;


    class CarrinhoController {

        public function selecionar(int $idCliente){
            $carrinhoDao = new CarrinhoDao();
            $carrinhoDao -> __set("idCliente", $idCliente);
            return $carrinhoDao -> selectByIdCliente();
        }
    }