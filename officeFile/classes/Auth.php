<?php

require_once 'Database.php';

class Auth {

    private $mysql;

    public function __construct() {
        if(!isset($_SESSION)){
            session_start();
        }
        $this->mysql = new Database();
    }

    function login($colmns, $table, $where,$password) {
        $result = $this->mysql->select($colmns, $table, $where);
        if ($result->num_rows > 0) {
            $user = (object) $result->fetch_assoc();
            return $user;
        }
        return 0;
    }

}

//$authObj = new Auth();
//$user = $authObj->login('*', 'users', ["email" => 'jahidik@mailinator.com',"password"=>"jahidik@mailinator.com"]);

