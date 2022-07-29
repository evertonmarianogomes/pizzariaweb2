<?php
    namespace Model;
    use Model\GenericDao;

    class LoginDao extends GenericDao{
        private $id, $login, $password;

        public function __set($name, $value) {
            $this -> $name = $value;
        }

        public function __get($name) {
            return $this -> $name;
        }
        
        /** Função que seleciona dados da tabela LOGIN por login e senha
         * @return Array Retorna um Array com os dados da coluna ou vazio se não existir
        */
        public function selectByLoginPassword() : Array{
            $sql = "SELECT * FROM login WHERE login = ? AND password = ?";
            return GenericDao :: executeQuery($sql, $this -> __get("login"), $this -> __get("password"));
        }

        /** Função que seleciona dados da tabela LOGIN pelo login da coluna
         * @return Array Retorna um Array com os dados da coluna ou vazio se não existir
        */
        public function selectByLogin() : Array{ 
            $sql = "SELECT * FROM login WHERE login = ?";
            return GenericDao :: executeQuery($sql, (String) $this -> __get("login"));
        }

        /** Função que seleciona dados tabela LOGIN pelo Id da coluna
         * @return Array Retorna um Array com os dados da coluna ou vazio se não existir
        */
        public function selectById() : Array{
            $sql = "SELECT * FROM login WHERE id = ?";
            return GenericDao :: executeQuery($sql, (int) $this -> __get("id"));
        }

        /** Função que insere dados na tabela LOGIN
         * @return bool Retorna TRUE se for inserido com sucesso ou FALSE se ocorreu um erro
        */
        public function insert() : bool{
            $sql = "INSERT INTO login VALUES (DEFAULT, ?, ?)";
            return GenericDao :: executeUpdate($sql, $this -> __get("login"), $this -> __get("password"));
        }

        /** Função que atualiza dados na tabela LOGIN pelo ID
         * @return bool Retorna TRUE se for atualizado com sucesso ou FALSE se ocorreu um erro
        */
        public function update() : bool{
            $sql = "UPDATE login SET login = ?, password = ? WHERE id = ?";
            return GenericDao :: executeUpdate($sql, $this -> __get("login"), $this -> __get("password"), (int) $this -> __get("id"));
        }

        /** Função que delete dados da tabela LOGIN pelo ID
         * @return bool Retorna TRUE se for excluido com sucesso ou FALSE se ocorreu um erro
        */
        public function delete() : bool{
            $sql = "DELETE FROM login WHERE id = ?";
            return GenericDao :: executeUpdate($sql, (int) $this -> __get("id"));
        }
    }