<?php

namespace Movies\Action;

use Interop\Container\ContainerInterface;
use Movies\Services\Database\MovieTable;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class RenderMoviesActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $template = $container->get(TemplateRendererInterface::class);
        //$movieData = $container->get('MovieData')();
        $movieData = $container->get(MovieTable::class);

        return new RenderMoviesAction($movieData, $router, $template);
    }
}
