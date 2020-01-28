<?php
include_once "../../vendor/lusito/notorm/src/Result.php";
class connection
{
    private $pdo;
    private $connection;
    private static $instance = null;
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "shop";
    private function __construct()
    {
        $this->pdo = new PDO("mysql:host={$this->host};
            dbname={$this->db}", $this->user, $this->pass,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'utf8'"));
        $this->connection = new NotOrm($this->pdo);
    }
    public static function getInstance()
    {
        if(!self::$instance)
            self::$instance = new connection();
        return self::$instance;
    }
    public function getConnection()
    {
        return $this->connection;
    }
}