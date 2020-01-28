<?php
include_once (dirname(__DIR__)."\models\View.php");
class HomeController
{
    public static function index($req, $resp, $arg)
    {
        $view = new View();
        $view->name = "test";
        $view->render("Products.php");
        return $resp;
    }
}