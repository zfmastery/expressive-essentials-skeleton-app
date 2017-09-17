<?php

namespace Movies\Services\Log;

use Interop\Container\ContainerInterface;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MonoLogFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->get('config');

        // create a log channel
        //$log = new Logger('name');
        //$log->pushHandler(new StreamHandler('path/to/your.log', Logger::WARNING));

        //return new RenderMoviesAction($client, $router, $template);
    }
}
