<?php

namespace Movies\Services\Log;

use Interop\Container\ContainerInterface;
use Movies\Middleware\LoggingMiddleware;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Psr\Log\LoggerInterface;

class LoggingMiddlewareFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('./data/log/app.log'));

        return new LoggingMiddleware($log);
    }
}
