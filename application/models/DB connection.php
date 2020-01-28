<?php
include_once $_SERVER['DOCUMENT_ROOT']."/NotORM.php";
class connection
{
    static $_instance;
    private $_db;
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "Shop";
    private function __construct()
    {
        $temp = new PDO("mysql:host=$this->host;
            dbname=$this->db", $this->user, $this->pass,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);
        $temp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_db = new NotORM($temp);
    }
    private function __clone(){}
    public static function getInstance()
    {
        if(!(self::$_instance instanceof  self))
        {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function getConnection()
    {
        return $this->_db;
    }
}