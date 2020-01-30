<?php
include_once "application/controllers/HomeController.php";
require 'vendor/autoload.php';
require 'vendor/psr/http-message/src/ServerRequestInterface.php';
require 'vendor/psr/http-message/src/ResponseInterface.php';

$app = new Slim\App();

$container = $app->getContainer();
$container['twig_c'] = function ($c)
{
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('application/views');
    $twig = new Twig_Environment($loader);
    return $twig;
};
$container['HomeController'] = function ($c)
{
    return new HomeController($c['twig_c']);
};

# Home page
$app->get('/', '\HomeController:index');
$app->get('/catalog/{id}', '\HomeController:fromCatalog');

$app->run();