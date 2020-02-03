<?php
include_once "application/controllers/HomeController.php";
require 'vendor/autoload.php';
require 'vendor/psr/http-message/src/ServerRequestInterface.php';
require 'vendor/psr/http-message/src/ResponseInterface.php';

$app = new Slim\App();

$container = $app->getContainer();
$container['nav_bar'] = function ($c) {
    return array(
        array("href" => "index.php", "content" => "products"),
        array("href" => "", "content" => "cart"),
        array("href" => "#", "content" => "order history"),
        array("href" => "#", "content" => "add item to catalog"),
        array("href" => "#", "content" => "create user"),
        array("href" => "#", "content" => "login")
    );
};
$container['twig_c'] = function ($c)
{
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('application/views');
    $twig = new Twig_Environment($loader);
    return $twig;
};
$container['HomeController'] = function ($c)
{
    return new HomeController($c);
};

# Home page
$app->get('/', '\HomeController:index');
$app->get('/catalog/{id}', '\HomeController:fromCatalog');

$app->run();