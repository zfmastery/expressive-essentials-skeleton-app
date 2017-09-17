<?php

use Movies\Middleware\{RenderMoviesMiddleware,RenderMoviesMiddlewareFactory};
use Zend\Expressive\AppFactory;
use Zend\ServiceManager\ServiceManager;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$container = new ServiceManager();

$container->setFactory('MovieData', function() {
    return include 'data/movies.php';
});

$container->setFactory(
    RenderMoviesMiddleware::class,
    RenderMoviesMiddlewareFactory::class
);

$app = AppFactory::create($container);
$app->get('/', RenderMoviesMiddleware::class);

$app->pipeRoutingMiddleware();
$app->pipeDispatchMiddleware();
$app->run();
