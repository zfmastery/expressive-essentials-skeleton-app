<?php
namespace Movies\Middleware;

use AuthenticationMiddleware;
use AuthorizationMiddleware;
use Psr\Container\ContainerInterface;
use Zend\Expressive\Application;
use Zend\Expressive\Router\RouterInterface;

trait SecureAccessPipelineTrait
{
    private function createPipeline(ContainerInterface $container)
    {
        $nested = new Application(
            $container->get(RouterInterface::class),
            $container
        );

        //$nested->pipe(AuthenticationMiddleware::class);
        //$nested->pipe(AuthorizationMiddleware::class);

        return $nested;
    }
}
