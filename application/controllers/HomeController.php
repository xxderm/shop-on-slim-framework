<?php
include_once dirname(__DIR__)."\models\DB connection.php";
class HomeController
{
    public $m_twig_container;
    public $m_nav_container;
    public $db;
    function __construct($container)
    {
        $this->m_twig_container = $container['twig_c'];
        $this->m_nav_container = $container['nav_bar'];
        $this->db = connection::getInstance();
    }
    public function index($req, $resp, $arg)
    {
        $data = $this->db->getConnection()->products;
        $template = $this->m_twig_container->loadTemplate('ProductsPage.html');
        echo $template->render(
            array(
                'prod' => $data,
                'title' => 'Production',
                'nav_list' => $this->m_nav_container
                ));
        return $resp;
    }
    public function fromCatalog($req, $resp, $arg)
    {
        $dataFromCatalog = $this->db->getConnection()->products()->select("*")->where("Catalog_id = ?", $arg['id']);
        $template = $this->m_twig_container->loadTemplate('ProductsPage.html');
        echo $template->render(
            array(
                'prod' => $dataFromCatalog,
                'title' => 'Production',
                'nav_list' => $this->m_nav_container
            ));
        return $resp;
    }
}