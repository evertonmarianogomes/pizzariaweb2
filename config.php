<?php

define("PROJECT_URL", "http://localhost/pizzariaweb2/");

define("PROJECT_NAME", "Pizzaria Web 2");


/** DataLayer config params 
 * Read coffeecode/dataLayer documentation in Packagist for more information
 * @link https://packagist.org/packages/coffeecode/datalayer    
 */
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "db_products",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

/** Message Helper 
 * @param String $messageText Description/text of message
 * @param int $messageType Indicates the type of the message
 *  - 1 (Default): Default message
 *  - 2: Error message
 *  - 3: Success message
 */
function message(String $messageText, int $messageType = 1) : stdClass
{
    $message = [
        "toast_body" => filter_var($messageText, 515),
        "title_class" => match($messageType){
            default => "text-primary",
            1 => "text-primary",
            2 => "text-danger",
            3 => "text-success"
        },
        "title" => match($messageType){
            default => "Mensagem",
            1 => "Mensagem",
            2 => "Erro",
            3 => "Sucesso"
        }
    ];
    
    return (object) $message;
}