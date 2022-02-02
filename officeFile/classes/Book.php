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
        if($result){
            return 'inserted';
        }else{
            return 'Not inserted';
        }
    }
    /**
     * 
     * Where Take array values     
     */
    function find($colmns, $table, $where) {  
        
        $result = $this->conn->select($colmns, $table, $where);
        $result = $result->fetch_assoc();
        if($result){
            return $result;
        }else{
            return 'error';
        }
    }
    
    function update($table,$updateArr,$whereArr) {
        $result = $this->conn->update($table, $updateArr, $whereArr);
        if($result){
            return $result;
        }else{
            return 'error';
        }
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

