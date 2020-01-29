<?php
include_once dirname(__DIR__)."\models\DB connection.php";
class HomeController
{
    public static function index($req, $resp, $arg)
    {
        $db = connection::getInstance();
        $data = $db->getConnection()->products;


        Twig_Autoloader::register();
        $loader = new Twig_Loader_Filesystem('application/views');
        $twig = new Twig_Environment($loader);
        $template = $twig->loadTemplate('ProductsPage.html');
        echo $template->render(
            array(
                'prod' => $data,
                'title' => 'Production'
                ));

        return $resp;
    }
    public static function fromCatalog($req, $resp, $arg)
    {
        echo $arg['id'];
        return $resp;
    }
}