<?php
include_once dirname(__DIR__)."\models\DB connection.php";
class AuthorizationController
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
    public function getSignUp($req, $resp, $arg)
    {
        $template = $this->m_twig_container->loadTemplate('SignUp.html');
        $catalogName = $this->db->getConnection()->catalog;
        echo $template->render(
            array(
                'title' => 'SignUp',
                'nav_list' => $this->m_nav_container,
                'catalog_buff' => $catalogName
            ));
        return $resp;
    }
    public function postSignUp($req, $resp, $arg)
    {
        var_dump($req->getParams());
        return $resp->withRedirect('/');
    }
    public function getSignIn($req, $resp, $arg)
    {
        $template = $this->m_twig_container->loadTemplate('SignIn.html');
        $catalogName = $this->db->getConnection()->catalog;
        echo $template->render(
            array(
                'title' => 'SignIn',
                'nav_list' => $this->m_nav_container,
                'catalog_buff' => $catalogName
            )
        );
        return $resp;
    }
    public  function postSignIn($req, $resp, $arg)
    {

    }
}