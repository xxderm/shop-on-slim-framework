<?php
include_once (dirname(__DIR__)."\models\View.php");
class HomeController
{
    public static function index($req, $resp, $arg)
    {
        View::render("Products.php");
        return $resp;
    }
}