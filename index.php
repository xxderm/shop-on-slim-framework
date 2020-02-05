<?php
include_once "application/controllers/HomeController.php";
include_once "application/controllers/AuthorizationController.php";
require 'vendor/autoload.php';
require 'vendor/psr/http-message/src/ServerRequestInterface.php';
require 'vendor/psr/http-message/src/ResponseInterface.php';

$app = new Slim\App();

$container = $app->getContainer();
$container['nav_bar'] = function ($c) {
    return array(
        array("href" => "/", "content" => "Products"),
        array("href" => "#", "content" => "Cart"),
        array("href" => "#", "content" => "Orders"),
        array("href" => "#", "content" => "add item to products"),
        array("href" => "/SignUp", "content" => "SignUp"),
        array("href" => "/SignIn", "content" => "SignIn")
    );
};
$container['twig_c'] = function ($c)
{
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('application/views');
    $twig = new Twig_Environment($loader, array('cache' => false));
    return $twig;
};
$container['HomeController'] = function ($c)
{
    return new HomeController($c);
};
$container['SignUpController'] = function ($c)
{
    return new SignUpController($c);
};

# Home page
$app->get('/', '\HomeController:index');
$app->get('/catalog/{id}', '\HomeController:fromCatalog');


# SignUp page
$app->get('/SignUp', '\AuthorizationController:getSignUp')->setName('auth.signup');
$app->post('/SignUp', '\AuthorizationController:postSignUp');


# SignIn page
$app->get('/SignIn', '\AuthorizationController:getSignIn')->setName('auth.signin');
$app->post('/SignIn', '\AuthorizationController:postSignIn');


$app->run();