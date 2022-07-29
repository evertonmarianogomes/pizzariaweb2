<?php
    namespace Model;
    
    class PizzaDao extends GenericDao {
        private $id, $sabor, $ingredientes, $precoUnitario;

        public function __get($name){
            return $this -> $name;
        }

        public function __set($name, $value) : void{
            $this -> $name = $value;
        }

        public function selectById() : Array{
            $sql = "SELECT * FROM pizza WHERE id = ?";
            return GenericDao :: executeQuery($sql, (int) $this -> __get("id"));
        }

        public function selectAll() : Array{
            return GenericDao :: executeQuery("SELECT * FROM pizza");
        }
    }