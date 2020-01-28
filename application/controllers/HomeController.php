<?php
include_once (dirname(__DIR__)."\models\View.php");
include_once dirname(__DIR__)."\models\DB connection.php";
class HomeController
{
    public static function index($req, $resp, $arg)
    {
        $db = connection::getInstance();
        $view = new View();
        $view->production = $db->getConnection()->products;
        $view->render("Products.php");
        return $resp;
    }
}