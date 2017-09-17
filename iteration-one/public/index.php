<?php

use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
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
$app->get('/', function ($request, $delegate) use($container) {
    $renderer = (new \Movies\BasicRenderer())(
        $container->get('MovieData')
    );
    return new HtmlResponse($renderer);
});

$app->pipeRoutingMiddleware();
$app->pipeDispatchMiddleware();

$app->run();
