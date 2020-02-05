<?php
class AuthorizationController
{
    public $m_twig_container;
    public $m_nav_container;
    function __construct($container)
    {
        $this->m_twig_container = $container['twig_c'];
        $this->m_nav_container = $container['nav_bar'];
    }
    public function getSignUp($req, $resp, $arg)
    {
        $template = $this->m_twig_container->loadTemplate('SignUp.html');
        echo $template->render(
            array(
                'title' => 'SignUp',
                'nav_list' => $this->m_nav_container
            ));
        return $resp;
    }
    public function postSignUp($req, $resp, $arg)
    {
        var_dump($req->getParams());
    }
    public function getSignIn($req, $resp, $arg)
    {
        $template = $this->m_twig_container->loadTemplate('SignIn.html');
        echo $template->render(
            array(
                'title' => 'SignIn',
                'nav_list' => $this->m_nav_container
            )
        );
        return $resp;
    }
    public  function postSignIn($req, $resp, $arg)
    {

    }
}