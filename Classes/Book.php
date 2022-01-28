<?php
namespace Classes;

include_once "./Database.php";

class Book
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Database();
    }

    public function index($colms = ['* or', 'columnName1', "columnName2"], $table = 'tableName', $where = '', $limit = '')
    {
        $result = $this->conn->select($colms, $table, $where = '', $limit = []);
        if ($result) {
            return $result;
        } else {
            return $this->conn->error;
        }

    }

}

// $b = new Book();
// $result = $b->index("*", "books");
// echo "<pre>";
// foreach ($result as $key => $value) {
//     # code...
//     print_r($value);
// }
