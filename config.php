<?php
    /** Arquivo de configuração do projeto */

    /** @var String Url do Projeto*/
    define("PROJECT_URL", "http://localhost/pizzariaweb2");

    /** Config. de conexão com o banco de dados */

    define("DATABASE", ["host" => "localhost",
                        "dbname" => "dbpizzariaweb2_legacy",
                        "port" => "3306",
                        "username" => "root",
                        "password" => ""]);

                        
    function url(String $uri = null){
        if($uri){
            return PROJECT_URL."/{$uri}";
        }

        return PROJECT_URL;
    }

    