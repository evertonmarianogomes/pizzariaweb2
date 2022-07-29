<?php
    namespace Model;

    use Model\GenericDao;

    class UsuarioDao extends GenericDao {
        private $usuario_id, $nome, $sobrenome, $idLogin;

        public function __get($name) {
            return $this -> $name;
        }

        public function __set($name, $value) {
            $this -> $name = $value;
        }
    }