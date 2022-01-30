<?php

class Database {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "tuhin";
    protected $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbName);
    }

    function select($colmns = ['columnName1', 'columnName2'], $table, $where = ["key" => 'value']) {

        $colmns = $this->getCol($colmns);
        $where = $this->checkWhere($where);
        $sql = "SELECT " . $colmns . " FROM " . $table.$where;
        
        $result = $this->conn->query($sql);
        return $result;
    }
    
    
    function insert($table,$data=["colName"=>"value"]) {
        
        $data = $this->formatData($data);
        $sql = "INSERT INTO ".$table.$data;
//        echo $sql;exit;
        $result = $this->conn->query($sql);
        if($this->conn->affected_rows == 1){
            return $result;
        }  else {
            return $this->conn->error;
        }
    }
    
    function update($table,$updateArr=[],$where=[]) {
        $updateArr = $this->updateArr($updateArr);
        $where = $this->checkWhere($where);
        $sql = "UPDATE ".$table.' SET '.$updateArr.$where;
        $result = $this->conn->query($sql);
        if($result){
            return $result;
        }else{
            return 'error';
        }
    }
    
    
    function delete($table,$where=['key'=>'value']) {
        
        $where = $this->checkWhere($where);
        $sql = 'DELETE FROM '.$table.$where;
        $result = $this->conn->query($sql);
        if($result){
            return $result;
        }else{
            return '';
        }
    }
    
    

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
    
    private function checkWhere($where)
    {
        if (!empty($where) && is_array($where) && $where !== ["key" => 'value']) {
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
    
    
    private function updateArr($updateArr) {
        if(!empty($updateArr)){
            $sql = '';
            $count= 1;
            foreach ($updateArr as $key => $value) {
                if ($count == count($updateArr)){
                $sql .= $key." = '".$value."' ";
                }else{
                $sql .= $key." = '".$value."', ";
                }
                $count++;
            }
            return $sql;
        }else{
            return 'error';
        }
    }
    
    
    // this will format inserted data from $_POST
    private function formatData($data) {
        if (!empty($data) && $data !== ["colName"=>"value"]) {
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
