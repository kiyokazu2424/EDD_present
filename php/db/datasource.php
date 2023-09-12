<?php
namespace db;

use PDO;

class DataSource 
{
    public $connection;
    public static $CLASS = "class";

    public function __construct($host = 'localhost', $port = 8889, $dbname = 'present', $username = 'root', $pwd = 'root') 
    {
        $dsn = "mysql:host={$host};port={$port};dbname={$dbname}";
        $this->connection = new PDO($dsn, $username, $pwd);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    private function executeSQL($sql, $params) 
    {
        $prst = $this->connection->prepare($sql);
        $prst->execute($params);
        return $prst;
    }

    public function select($sql, $params, $type = '', $cls = '') 
    {
        $prst = $this->executeSQL($sql, $params);

        if($type == DataSource::$CLASS) {
            $result = $prst->fetchAll(PDO::FETCH_CLASS, $cls);
        } else {
            $result = $prst->fetchAll();
        }

        return $result;
    }

    public function selectOne($sql, $params, $type = '', $cls = '') 
    {
        $result = $this->select($sql, $params, $type, $cls);
        return count($result) > 0 ? $result[0] : [];
    }

    public function execute($sql, $params) 
    {
        return $this->executeSQL($sql, $params);
    }

    public function beginTXN() 
    {
        $this->connection->beginTransaction();
    }

    public function commit() 
    {
        $this->connection->commit();
    }

    public function rollback() 
    {
        $this->connection->rollBack();
    }
}
?>