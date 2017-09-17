<?php

namespace Movies\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\Expressive\Router\RouterInterface;

class RenderMoviesActionPipelineFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $application = new Application(
            $container->get(RouterInterface::class),
            $container
        );

        //$pipeline->pipe($container->get(AuthenticationMiddleware::class));
        //$pipeline->pipe($container->get(AuthorizationMiddleware::class));
        $application->pipe(RenderMoviesAction::class);

        return $application;
    }
}
