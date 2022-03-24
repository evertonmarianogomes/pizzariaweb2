<?php
    namespace Model;
    use CoffeeCode\DataLayer\DataLayer;

    class LoginDao extends DataLayer 
    {
        public function __construct()
        {
            parent::__construct("login", ["login", "password"]);
        }

        /** Return User by Login ID */

        public function user() : UserDao
        {
            $idLogin =  (int) $this->fetch()->data()->id;
            return (new UserDao()) -> find("idLogin = :idLogin", http_build_query(["idLogin"=>(int) $idLogin]));
        }

        
    }