<?php
include_once "application/controllers/HomeController.php";
include_once "application/controllers/AuthorizationController.php";
include_once "application/controllers/CartController.php";
include_once "application/controllers/OrderController.php";
include_once "application/controllers/AppendController.php";
require 'vendor/autoload.php';
require 'vendor/psr/http-message/src/ServerRequestInterface.php';
require 'vendor/psr/http-message/src/ResponseInterface.php';
session_start();
$app = new Slim\App(
    [
        'settings' =>
        [
            'displayErrorDetails' => true,
            'db' =>
            [
                'driver' => 'mysql',
                'host' => 'localhost',
                'database' => 'shop',
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ]
        ]
    ]
);
$container = $app->getContainer();

# ORM
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

# Containers
$container['csrf'] = function ($c)
{
    return new \Slim\Csrf\Guard;
};
$container['db'] = function ($c) use ($capsule)
{
    return $capsule;
};
$container['validator'] = function ($container)
{
    return new App\Validation\Validator;
};
$container['nav_bar'] = function ($c)
{
    return array(
        array("href" => "/", "content" => "Products"),
        array("href" => "/Cart", "content" => "Cart"),
        array("href" => "/Orders", "content" => "Orders"),
        array("href" => "/Append", "content" => "Append"),
        array("href" => "/SignUp", "content" => "Sign Up"),
        array("href" => "/SignIn", "content" => "Sign In")
    );
};
$container['auth'] = function ($c)
{
    return new \App\Auth\Auth;
};
$container['twig_c'] = function ($c)
{
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('application/views');
    $twig = new Twig_Environment($loader, array('cache' => false));
    $twig->addGlobal('auth',
        [
            'check' => $c['auth']->check(),
            'user' => $c['auth']->user()
        ]);
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
$container['CartController'] = function ($c)
{
    return new CartController($c);
};
$container['OrderController'] = function ($c)
{
    return new OrderController($c);
};
$container['AppendController'] = function ($c)
{
    return new AppendController($c);
};

# Middleware
$app->add(new \App\Middleware\CsrfViewMiddleware($container));

# csrf
$app->add($container->csrf);

# Home page
$app->get('/', '\HomeController:index');
$app->get('/catalog/{id}', '\HomeController:fromCatalog');

# SignUp page
$app->get('/SignUp', '\AuthorizationController:getSignUp')->setName('auth.signup');
$app->post('/SignUp', '\AuthorizationController:postSignUp');

# SignIn page
$app->get('/SignIn', '\AuthorizationController:getSignIn')->setName('auth.signin');
$app->post('/SignIn', '\AuthorizationController:postSignIn');

# SignOut page
$app->get('/SignOut', '\AuthorizationController:getSignOut')->setName('auth.signout');

# Cart page
$app->get('/Cart', '\CartController:getCart')->setName('usr.cart');
$app->get('/InsertToCart/{id}', '\CartController:Insert');
$app->get('/EraseFromCart/{id}', '\CartController:Erase');
$app->get('/ToOrder/{id}/{return}', '\CartController:toOrder');

# Orders page
$app->get('/Orders', '\OrderController:index')->setName('usr.orders');

# Append page
$app->get('/Append', '\AppendController:index')->setName('usr.append');

$app->run();