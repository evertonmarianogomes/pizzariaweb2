<?php
    namespace Model;
    use Connection\ConnectionFactory;
    use PDO;
    use Exception;
    use PDOException;

    /** Classe de Dao Generica */
    class GenericDao {

        /** Executa uma consulta (SELECT FROM) no banco de dados
         * @param String $sql String com a instrução de seleção SQL que será preparada
         * @param Array $parameters [Opcional] Parametros que serão inseridos na instrução preparada
         * @return Array Retorna um Array com os dados ou um Array Vazio se não for encontrado nada ou se houve um erro na execução
        */
        protected static function executeQuery(String $sql, ...$parameters) : Array{
            try {
                $con = ConnectionFactory :: getConnection();
                $stmt = $con -> prepare($sql);
                for ($i=0; $i < count($parameters); $i++) { 
                    $stmt -> bindValue($i+1, $parameters[$i]);
                }
                
                $stmt -> execute();                
                return $stmt -> fetchAll(PDO::FETCH_OBJ);
            } catch(PDOException | Exception $exception){
                echo "<div style=\"margin: 2px; background-color:#e53935;border-radius:10px;color: white;\"><p style=\"padding: 10px;\"> Ocorreu um erro ao executar a Query: <b>" . $exception -> getMessage() . "</b></p></div>";
            } finally {
                ConnectionFactory :: closeConnection($con);
            }
        }

        /** Executa uma instrução de manipulação de dados no banco de dados 
         * @param String $sql String com a instrução SQL que será preparada
         * @param Array $parameters Parametros que serão inseridos na instrução preparada
         * @return bool Retorna verdadeiro se executado com sucesso ou falso se houve erro na execução
        */

        protected static function executeUpdate(String $sql, ...$parameters) : bool{
            try {
                $con = ConnectionFactory :: getConnection();
                $stmt = $con -> prepare($sql);
                for ($i=0; $i < count($parameters); $i++) { 
                    $stmt -> bindValue($i+1, $parameters[$i]);
                }
                
                return $stmt -> execute();

            } catch(PDOException | Exception $exception){
                echo "<div style=\"margin: 2px; background-color:#e53935;border-radius:10px;color: white;\"><p style=\"padding: 10px;\"> Ocorreu um erro ao executar a Query: <b>" . $exception -> getMessage() . "</b></p></div>";
            } finally {
                ConnectionFactory :: closeConnection($con);
            }
        }
    }