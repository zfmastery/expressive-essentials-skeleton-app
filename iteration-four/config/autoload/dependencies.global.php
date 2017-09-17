<?php

use GuzzleHttp\ClientInterface;
use Movies\Action\ApiAction;
use Movies\Middleware\RenderMoviesMiddleware;
use Movies\Middleware\RenderMoviesMiddlewareFactory;
use \Zend\Expressive\Container\ApplicationFactory;
use \Zend\Expressive\Application;

return [
    'dependencies' => [
        'factories' => [
            Application::class => ApplicationFactory::class,
            RenderMoviesMiddleware::class => RenderMoviesMiddlewareFactory::class
        ],
    ]
];
