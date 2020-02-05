<?php
include_once dirname(__DIR__)."\models\DB connection.php";
class HomeController
{
    public $m_twig_container;
    public $m_nav_container;
    function __construct($container)
    {
        var_dump($container['db']);
        $this->m_twig_container = $container['twig_c'];
        $this->m_nav_container = $container['nav_bar'];
    }
    public function index($req, $resp, $arg)
    {
        $db = connection::getInstance();
        $data = $db->getConnection()->products;
        $template = $this->m_twig_container->loadTemplate('ProductsPage.html');
        echo $template->render(
            array(
                'prod' => $data,
                'title' => 'Production',
                'nav_list' => $this->m_nav_container
                ));
        return $resp;
    }
    public static function fromCatalog($req, $resp, $arg)
    {
        echo $arg['id'];
        return $resp;
    }
}