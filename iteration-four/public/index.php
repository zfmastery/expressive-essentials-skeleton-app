<?php

use Zend\Expressive\Application;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$container = include 'config/container.php';
$container->setFactory('MovieData', function() {
    return include 'data/movies.php';
});

/** @var Application $app */
$app = $container->get(Application::class);

$app->pipeRoutingMiddleware();
$app->pipeDispatchMiddleware();
require 'config/pipeline.php';
require 'config/routes.php';
$app->run();
