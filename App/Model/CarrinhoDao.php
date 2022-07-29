<?php
    namespace Model;

    class CarrinhoDao extends GenericDao {
        private $id, $qtdPizza, $idPizza, $idCliente;

        public function __get($name) {
            return $this -> $name;
        }

        public function __set($name, $value){
            $this -> $name = $value;
        }

        public function selectByIdCliente(){
            $sql = "select pizza.*, carrinho.qtdPizza from carrinho inner join pizza on carrinho.idPizza = pizza.id inner join cliente on carrinho.idCliente = cliente.id where cliente.id = ?";
            return GenericDao :: executeQuery($sql, $this -> __get("idCliente"));
        }
        
        public function insert(){

        }

        public function update(){

        }

        public function delete(){

        }
    }