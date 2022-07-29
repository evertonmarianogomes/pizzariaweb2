<?php
    namespace Model;

    class HistoricoDao extends GenericDao {
        private $id, $saborPizza, $qtdPizza, $valorTotal, $createdAt, $idCliente;

        public function __get($name){
            return $this -> $name;
        }

        public function __set($name, $value) : void {
            $this -> $name = $value;;
        }

        public function selectAll() : Array{
            $sql = "select historico.* from historico inner join cliente on historico.idCliente = cliente.id where cliente.id = ?";
            return GenericDao :: executeQuery($sql, (int) $this -> __get("idCliente"));
        }

        public function insert(){
            $sql = "insert into historico values (default, ?, ?, ?, ?, ?)";
            return GenericDao :: executeUpdate($sql, $this -> __get("saborPizza"), $this -> __get("qtdPizza"), $this -> __get("valorTotal"), $this -> __get("createdAt"), (int) $this -> __get("idCliente"));
        }

        public function selectByID() : Array{
            $sql = "select historico.* from historico where id = ? and idCliente = ?";
            return GenericDao :: executeQuery($sql, (int) $this -> __get("id"), (int) $this -> __get("idCliente"));
        }
    }

