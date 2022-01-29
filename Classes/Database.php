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
        return $this->mysql;
    }
    /**
     *
     * Select Function
     */

    public function select($colms = ['* or', 'columnName1', "columnName2"], $table = 'tableName', $where = ["key" => 'value'])
    {
        $sql = "SELECT " . $this->checkColumn($colms) . " FROM " . $table . $this->checkWhere($where);

        echo $sql;
        // die();

        $result = $this->mysql->query($sql);
        if ($result) {
            return $result;
        } else {
            return $this->mysql->error;
        }
    }

    public function OrderBY($colms = ['* or', 'columnName1', "columnName2"], $table = 'tableName', $orderBY = ["id", "ASC"], $limit, $offset)
    {

        $sql = "SELECT " . $this->checkColumn($colms) . " FROM " . $table . $this->formatOrderBY($orderBY) . $this->checkLimit($limit, $offset);
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
    public function insert($table, $data = ["columnName" => "value"])
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

    public function update($colms, $table, $data = [], $where = ["key" => 'value'])
    {
        // $colName = array_keys($data);
        // $colValue = array_values($data);
        $sql = "UPDATE " . $table . " SET ";
        $result = $this->mysql->query($sql);
        if ($result) {
            return $result;
        }

    }

    /**
     *
     * Delete Function
     */
    public function delete($colms, $table, $where = ["key" => 'value'])
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
        if (!empty($where) && is_array($where) && $where !== ["key" => 'value'] && $where !== null) {
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
    private function makeData($data = [])
    {
        if (!empty($data) && $data !== ["columnName" => "value"]) {
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

    private function formatOrderBY($orderBY)
    {
        if (!empty($orderBY)) {
            if (is_array($orderBY) && $orderBY !== ["Column_name", "order"]) {
                $sql = ' ORDER BY ' . implode(" ", $orderBY);
                return $sql;
            } else {
                // throw new Exception("Input not an array: ['orderBY','order']", 1);
                return '';
            }
        } else {
            return '';
        }
    }

    private function checkLimit($limit, $offset)
    {
        if (!empty($limit)) {
            $sql = " LIMIT " . $limit;
            if (!empty($offset)) {
                $sql .= " OFFSET " . $offset;
                return $sql;
            } else {
                return $sql;
            }

        } else {
            return $limit = '';
        }
    }

}
