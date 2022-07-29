<?php
    namespace Model;
    use Model\UsuarioDao;

    class ClienteDao extends UsuarioDao {
        private $id, $telefone, $endereco, $emailUsuario, $idUsuario;

        public function __get($name){
            return $this -> $name;
        }

        public function __set($name, $value){
            $this -> $name = $value;
        }

        public function selectByIdLogin() : Array{
            $sql = "select cliente.id as idCliente, cliente.telefone, cliente.endereco, cliente.emailUsuario, cliente.idUsuario, usuario.nome, usuario.sobrenome, usuario.idLogin from cliente inner join usuario on usuario.id = cliente.idUsuario where usuario.idLogin = ?";
            return GenericDao :: executeQuery($sql, (int) $this -> __get("idLogin"));
        }

        public function selectAll() : Array{
            $sql = "SELECT cliente.id AS idCliente, usuario.* FROM cliente INNER JOIN usuario ON usuario.id = cliente.idUsuario";
            return GenericDao :: executeQuery($sql);
        }

        public function insert() : bool{
            $sql = "INSERT INTO cliente VALUES (default, ?, ? ,?, ?)";
            return GenericDao :: executeUpdate($sql, $this -> __get("telefone"), $this -> __get("endereco"), $this -> __get("emailUsuario"), (int) $this -> __get("idUsuario"));
        }

    }
