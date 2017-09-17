<?php

namespace Movies\Middleware;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class RenderMoviesMiddlewareFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return RenderMoviesMiddleware
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new RenderMoviesMiddleware($container->get('MovieData'));
    }
}
