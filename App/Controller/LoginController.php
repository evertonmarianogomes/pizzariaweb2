<?php
    namespace Controller;

    class LoginController {
        public function validateLogin(array $data) : void
        {
           $password = filter_var($data["password"], 515);

           echo hash("whirlpool", $password);

        }
    }