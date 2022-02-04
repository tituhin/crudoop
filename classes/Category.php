<?php

require_once 'Database.php';
require_once 'Auth.php';

class Category {
    
    private $conn;
    private $table ="book_categories";
    private $colmns = "*";
    public function __construct() {
        
        $this->conn = new Database();
        $this->session = new Auth();
    }
    
    public function index($colmns=[]) {
        $table = $this->table;
        $colmns = (empty($colmns)) ? $this->colmns : $colmns;
        $result = $this->conn->select($colmns, $table);
        return $result;
    }
    
    function find($where,$colmns=[]) {  
        
        $table = $this->table;
        $colmns = (empty($colmns)) ? $this->colmns : $colmns;
        $result = $this->conn->select($colmns, $table, $where);
        $result = $result->fetch_assoc();
        return $result;
    }

}

$cat = new Category();
$result = $cat->find(['id'=>1]);
echo '<pre>';
print_r($result);

