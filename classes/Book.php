<?php

require_once 'Database.php';
require_once 'Auth.php';

class Book {
    
    private $conn;
    private $session;

    public function __construct() {
        
        $this->conn = new Database();
        $this->session = new Auth();
    }

    function index($col, $table) {
        $result = $this->conn->select($col, $table);
        return $result;
    }
    // insert Function for book
    function insert($table, $data = []) {
        $result = $this->conn->insert($table, $data);
        return $result;
    }

    /**
     * 
     * Where Take array values     
     */
    function find($colmns, $table, $where) {
        $result = $this->conn->select($colmns, $table, $where)->fetch_assoc();        
        return $result;
    }

    function update($table, $updateArr, $whereArr) {
        $result = $this->conn->update($table, $updateArr, $whereArr);
        return $result;
    }

    function delete($table,$where) {
        $result = $this->conn->delete($table, $where);
        if($result){
            return 'success';
        }  else {
            return 'failed';
        }
        
    }
    
    function pagination($colms,$table,$limit,$offset) {
        $result = $this->conn->pagination($colms, $table, $limit, $offset);
        if($result){
            return $result;
        }else{
            return 0;
        }
    }

}

