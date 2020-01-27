<?php
class connection
{
    private function __construct()
    {
        $this->link = new PDO("mysql:host={$this->host};
            dbname={$this->db}", $this->user, $this->pass,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'utf8'"));
    }
    public static function getInstance()
    {
        if(!self::$instance)
            self::$instance = new connection();
        return self::$instance;
    }
    public function getConnection()
    {
        return $this->link;
    }
    private $link;
    private static $instance = null;
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "Shop";
}