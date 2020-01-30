<?php
include_once dirname(__DIR__)."\models\DB connection.php";
class HomeController
{
    public $m_twig_container;
    function __construct($twig)
    {
        $this->m_twig_container = $twig;
    }
    public function index($req, $resp, $arg)
    {
        $db = connection::getInstance();
        $data = $db->getConnection()->products;
        $template = $this->m_twig_container['twig_c']->loadTemplate('ProductsPage.html');
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