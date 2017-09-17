<?php

namespace Movies\Action;

use Interop\Container\ContainerInterface;
use Movies\Services\Database\MovieTable;
use Zend\Expressive\{
    Application, Router\RouterInterface, Template\TemplateRendererInterface
};

class RenderMoviesActionDelegatorFactory
{
    public function __invoke(ContainerInterface $container, $name, callable $callback)
    {
        $pipeline = new Application(
            $container->get(RouterInterface::class),
            $container
        );

        //$pipeline->pipe($container->get(AuthenticationMiddleware::class));
        //$pipeline->pipe($container->get(AuthorizationMiddleware::class));
        $pipeline->pipe($callback());

        return $pipeline;
    }
}
