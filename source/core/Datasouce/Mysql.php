<?php

namespace Core\Datasouce;

class Mysql
{
    
//    public function __construct() {
//        echo "fffffffffffffffff";
//        $this->connect();
//    }
    
    protected function connect()
    {
        return "fff";
        $configs = include('../../../database.php');
        $host = $database;
        print_r($host);die;
        $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
        try {
                $pdo = new PDO($dsn, $user, $password);
                if ($pdo) {
                        echo "Connected to the $db database successfully!";
                }
        } catch (PDOException $e) {
                echo $e->getMessage();
        }
    }
    
    public function all()
    {
        
    }
    
    public function find($id)
    {
        
    }
    
    public function save($object)
    {
        
    }
    
    public function updatedAll($object, $ids = [])
    {
        
    }
    
    public function delete($id)
    {
        
    }
    
    public function deleteAll($ids = [])
    {
        
    }
    
    public function transaction()
    {
        
    }
    
    public function commit()
    {
        
    }
    
    public function query($sqlCommand)
    {
        
    }
}