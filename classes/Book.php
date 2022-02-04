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

    public function index($col, $table) {
        $result = $this->conn->select($col, $table);
        return $result;
    }

    // insert Function for book
    public function insert($table, $data = []) {
        $result = $this->conn->insert($table, $data);
        return $result;
    }

    /**
     * 
     * Where Take array values     
     */
    public function find($colmns, $table, $where) {
        $result = $this->conn->select($colmns, $table, $where)->fetch_assoc();
        return $result;
    }

    public function update($table, $updateArr, $whereArr) {
        $result = $this->conn->update($table, $updateArr, $whereArr);
        return $result;
    }

    public function delete($table, $where) {
        $result = $this->conn->delete($table, $where);
        return $result;
    }

    public function pagination($colms, $table, $limit, $offset) {
        $result = $this->conn->pagination($colms, $table, $limit, $offset);
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }

    public function join($colums, $maintable, $jointypes, $joinTables, $joinConditions,$where = '',$limit='', $offset='') {
        $result = $this->conn->join($colums, $maintable, $jointypes, $joinTables, $joinConditions,$where,$limit, $offset);
        return $result;
    }

}


//$bok = new Book();
//$result = $bok->join("books.*, book_categories.name as category_name,users.name as user_name", "books", ['INNER JOIN',"INNER JOIN"], ["users","book_categories"], ["users.id = books.user_id","book_categories.id = books.category_id"]);
//$type = gettype($result);
////print_r($result);
//if(gettype($result) == "array"){
//    echo 'yes it is an array';
//}elseif(gettype($result) == "string"){
//    echo $result; 
//}else{
//    print_r($result);
//}