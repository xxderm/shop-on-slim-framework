<?php
use App\Models\Product;
include_once dirname(__DIR__)."\models\DB connection.php";
class AppendController
{
    public $m_twig_container;
    public $m_nav_container;
    public $db;
    public $auth;
    public $capsule;
    public function __construct($container)
    {
        $this->m_twig_container = $container['twig_c'];
        $this->m_nav_container = $container['nav_bar'];
        $this->auth = $container['auth'];
        $this->capsule = $container['db'];
        $this->db = connection::getInstance();
    }
    public function index($req, $resp, $arg)
    {
        $catalogName = $this->db->getConnection()->catalog;
        $template = $this->m_twig_container->loadTemplate('Append.html');

        echo $template->render(
            array(
                'title' => 'Append',
                'nav_list' => $this->m_nav_container,
                'catalog_buff' => $catalogName
            ));
        return $resp;
    }
    public function postAppend($req, $resp, $arg)
    {
        Product::create(
            [
                'Catalog_id' => $req->getParam('Catalog'),
                'Name' => $req->getParam('Name'),
                'Count' => $req->getParam('Count'),
                'Price' => $req->getParam('Price'),
                'Image' => $req->getParam('Image'),
                'Description' => $req->getParam('Description'),
                'Discount' => $req->getParam('Discount')
            ]
        );
        return $resp->withRedirect('/');
    }
}