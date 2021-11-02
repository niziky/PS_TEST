<?php
namespace App\Models;


class AppModel{
    
    protected $table        = '';
    protected $connection   = null;
    protected $dataSouce    = 'mysql';


    public function __construct() {
        $this->connection = $this->connect();
    }
    
    protected function connect()
    {
        $configs        = include(__DIR__.'../../../config/database.php');
        $dbConfig       = $database[$this->dataSouce];
        $host           = $dbConfig['host'];
        $user           = $dbConfig['user'];
        $password       = $dbConfig['pass'];
        $port           = $dbConfig['port'];
        $db             = $dbConfig['db'];
        $dsn = "mysql:host=$host;dbname=$db;charset=gbk";
        try {
            $pdo = new \PDO($dsn, $user, $password);
            $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ); 
        } catch (PDOException $e) {
            #TODO
        }
        return $pdo;
    }
    
    public function setDataSouce($dataSouce)
    {
        $this->dataSouce = $dataSouce;
    }
}