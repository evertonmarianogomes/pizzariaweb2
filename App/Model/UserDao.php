<?php
    namespace Model;
    use CoffeeCode\DataLayer\DataLayer;

    class UserDao extends DataLayer
    {
        public function __construct()
        {
            parent::__construct("user", ["first_name", "last_name", "idLogin"]);   
        }
    }