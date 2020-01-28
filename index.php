<?php
include_once "application/controllers/HomeController.php";
require 'vendor/autoload.php';
$app = new Slim\App();

# Home page
$app->get('/', HomeController::class . ':index');

$app->run();