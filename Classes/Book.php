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

    public function index($colms, $table, $where = '', $orderBy = '', $limit = '')
    {
        return (object) $this->conn;
        die();
        $result = $this->conn->select($colms, $table, $where, $orderBy, $limit);
        if ($result) {
            return $result;
        } else {
            return $this->conn->error;
        }

    }

}

$b = new Book();
print_r($b->index("*", 'book'));
echo "<pre>";
foreach ($result as $key => $value) {
    # code...
    print_r($value);
}
