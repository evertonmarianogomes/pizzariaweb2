<?php
    namespace Connection;
    use PDO;
    use PDOException;

    require_once($_SERVER["DOCUMENT_ROOT"]."/pizzariaweb2/vendor/autoload.php");
    
    /** Classe de controle de conexão com o Banco de Dados*/

    class ConnectionFactory {

        /** Obtem a conexão com o Banco de Dados
         * @return PDO Retorna um objeto PDO com a conexão 
         * 
        */
        public static function getConnection() : PDO{
            try {
                return new PDO("mysql:host=".DATABASE["host"].";dbname=".DATABASE["dbname"].";port=".DATABASE["port"].";charset=utf8", DATABASE["username"], DATABASE["password"]);
            } catch(PDOException $e){
                echo $e -> getMessage();
            }
        }

        /** Fecha a conexão com o Banco de Dados
         * @param PDO $con Objeto da classe PDO com a conexão
         * @return bool Retorna verdadeiro se for fechado com sucesso ou falso se ocorreu uma falha ao encerrar a conexão
        */

        public static function closeConnection(PDO $con): bool{
            try {
                if ($con != null) {
                    $con = null;
                    return true;
                }
                        
            } catch(PDOException $e){
                echo $e -> getMessage();
                return false;
            }
        }

    }