<?php
namespace Classes;

use mysqli;

class Database
{

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbNmae = "tuhin";
    protected $mysql;
    public function __construct()
    {
        $this->mysql = new mysqli($this->host, $this->user, $this->password, $this->dbNmae);
    }
    /**
     *
     * Select Function
     */

    public function select($colms = ['* or', 'columnName1', "columnName2"], $table = 'tableName', $where = ["key" => 'value'], $limit = 'integer value')
    {
        $sql = "SELECT " . $this->checkColumn($colms) . " FROM " . $table . $this->checkWhere($where);

        // echo $sql;
        // die();

        $result = $this->mysql->query($sql);
        if ($result) {
            return $result;
        } else {
            return $this->mysql->error;
        }
    }

    /**
     *
     * Insert Query Function
     */
    public function insert($table, $data = ["columnName" => "value"], $where = [])
    {

        $sql = "INSERT INTO $table " . $this->makeData($data);
        $result = $this->mysql->query($sql);
        if ($result) {
            return $result;
        }
    }

    /**
     *
     * Update Function
     */

    public function update($colms, $table, $where = [])
    {
        # code...
    }

    /**
     *
     * Delete Function
     */
    public function delete($colms, $table)
    {
        # code...
    }

    /**
     * private function for colmn checking
     */
    private function checkColumn($colms)
    {
        if ($colms == "*") {
            return $colms;
        } elseif (is_array($colms)) {
            $string = implode(', ', $colms);
            return $string;
        } else {
            $colms = '*';
            return $colms;
        }
    }

    /**
     * private function for where checking
     */
    private function checkWhere($where)
    {
        if (!empty($where)) {
            $sql = " WHERE ";
            $count = 1;
            foreach ($where as $key => $value) {
                if ($count == count($where)) {
                    $sql .= $key . " = '" . $value . "'";
                } else {
                    $sql .= $key . " = '" . $value . "' AND ";
                }
                $count++;
            }
            return $sql;
        } else {
            return '';
        }

    }

    /**
     *
     * Value Manupulate Function
     */
    public function makeData($data = [])
    {
        if (!empty($data)) {
            $columnName = array_keys($data);
            $columnValue = array_values($data);
            $colName = '';
            $colValue = '';
            foreach ($columnName as $key => $value) {
                if ($key == count($columnName) - 1) {
                    $colName .= $value;
                    $colValue .= "'" . $columnValue[$key] . "'";
                } else {
                    $colName .= $value . ",";
                    $colValue .= "'" . $columnValue[$key] . "',";
                }
            }
            $string = "(" . $colName . ") VALUES " . " (" . $colValue . ") ";
            return $string;

        }
    }

}

$db = new Database();

// $result = $db->select(['name', 'author', 'publish_date'], 'books', ['id' => 6, "name" => "Julian Gardner"]);
// if ($result) {
//     echo "<pre>";
//     foreach ($result as $key => $value) {
//         print_r($value);
//     }
// }

// $result = $db->select("*", 'books', ['name' => "OOP", "author" => "Programmer"]);
// if ($result) {
//     $row = (object) $result->fetch_assoc();
//     if (($row->name == "OOP")) {
//         echo "exist";
//     }
// }

// $result = $db->insert('books', ["name" => "OOP", "author" => "Programmer", "rating" => 3.5, "publish_date" => "2009-02-14", "details" => "simple Details", "user_id" => 9, "category_id" => 3]);
// echo "<pre>";
// print_r($result);
