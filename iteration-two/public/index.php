<?php

use Interop\Http\ServerMiddleware\DelegateInterface;
use Movies\Middleware\RenderMoviesMiddleware;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\AppFactory;
use Zend\ServiceManager\ServiceManager;

chdir(dirname(__DIR__));
require 'vendor/autoload.php';

$container = new ServiceManager();
$container->setFactory('MovieData', function() {
    return include 'data/movies.php';
});

$app = AppFactory::create($container);

/**
 * @var ServerRequestInterface $request
 * @var DelegateInterface $delegate
 */
$app->get('/', (new RenderMoviesMiddleware($container->get('MovieData'))));

$app->pipeRoutingMiddleware();
$app->pipeDispatchMiddleware();
$app->run();
