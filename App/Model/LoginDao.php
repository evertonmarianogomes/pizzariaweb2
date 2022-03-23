<?php
    namespace Model;
    use CoffeeCode\DataLayer\DataLayer;

    class LoginDao extends DataLayer 
    {
        public function __construct()
        {
            parent::__construct("login", ["login", "password"]);
        }
    }