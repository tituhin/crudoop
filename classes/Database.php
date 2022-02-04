<?php

class Database {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "tuhin";
    protected $conn;

    public function __construct() {

        // Link of Database
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbName);
    }

    // Select Function 
    function select($colmns = ['columnName1', 'columnName2'], $table, $where = ["key" => 'value']) {

        $colmns = $this->getCol($colmns);
        $where = $this->checkWhere($where);
        $sql = "SELECT {$colmns} FROM {$table} {$where}";
//        echo $sql;exit;
        $result = $this->conn->query($sql);
        return $result;
    }

    // Insert Function
    function insert($table, $data = ["colName" => "value"]) {
        
        $sql = "INSERT INTO {$table} {$this->formatData($data)} ";
//        echo $sql;exit;
        $result = $this->conn->query($sql);

        if ($this->conn->affected_rows == 1) {
            return $result;
        } else {
            return $this->conn->error;
        }
    }

    //Update Function
    function update($table, $updateArr = [], $where = ["key" => 'value']) {
        $updateArr = $this->updateArr($updateArr);
        $where = $this->checkWhere($where);
        $sql = "UPDATE {$table} SET {$updateArr} {$where}";
//        echo $sql;exit;
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return 'error';
        }
    }

    // Delete Function
    function delete($table, $where = ['key' => 'value']) {

        $where = $this->checkWhere($where);
        $sql = "DELETE FROM {$table} {$where}";
        echo $sql;exit;
        $result = $this->conn->query($sql);
        if ($result) {
            return $result;
        } else {
            return '';
        }
    }

    // Paginate Function
    public function pagination($colmns,$table,$limit,$offset) {
        $colmn = $this->getCol($colmns);
        $sql = "SELECT {$colmn} FROM {$table} LIMIT {$limit} OFFSET {$offset}";
//        echo $sql;exit;
        $result = $this->conn->query($sql);
        return $result;
    }

    public function join($join = ["join1", 'join2'],$where) {
        $sql = "{$join}  ";
    }

    /**
     * 
     * These Are Helper Functions
     *      
     */
    // Colummns checher Whether it has aray value or string type value
    private function getCol($colmns) {
        if (!empty($colmns)) {

            if (is_array($colmns) && $colmns !== ['columnName1', 'columnName2']) {
                $sql = implode(",", $colmns);
                return $sql;
            } else {
                return "*";
            }
        } else {
            return '*';
        }
    }

    // This will make WHERE Claus 
    private function checkWhere($where) {
        if (!empty($where) && is_array($where) && $where !== ["key" => 'value']) {
            $sql = " WHERE ";
            $count = 1;
            foreach ($where as $key => $value) {
                if ($count == count($where)) {
                    $sql .= " {$key} = ' {$value} ' ";
                } else {
                    $sql .= " {$key}  = ' {$value} ' AND " ;
                }
                $count++;
            }

            return $sql;
        } else {
            return '';
        }
    }

    // this will manage post data for Update
    private function updateArr($updateArr) {
        if (!empty($updateArr)) {
            $sql = '';
            $count = 1;
            foreach ($updateArr as $key => $value) {
                if ($value == '' or $key == 'id') {
                    $sql ='';
                }
                elseif ($count == count($updateArr)) {
                    $sql .= " {$key} = '{$value}' ";
                } else {
                    $sql .= " {$key} = '{$value}', ";
                    ;
                }
                $count++;
            }
            return $sql;
        } else {
            return '';
        }
    }

    // this will format inserted data from $_POST
    private function formatData($data) {
        if (!empty($data) && $data !== ["colName" => "value"]) {
            $columnName = array_keys($data);
            $columnValue = array_values($data);
            $colName = '';
            $colValue = '';
            foreach ($columnName as $key => $value) {
                if ($key == count($columnName) - 1) {
                    $colName .= " {$value} ";
                    $colValue .= " '$columnValue[$key]' ";
                } else {
                    $colName .= " {$value}, ";
                    $colValue .=  " '$columnValue[$key]', ";
                }
            }
            $string = "( {$colName} ) VALUES ( {$colValue} )";
            return $string;
        } else {
            return '';
        }
    }

}
