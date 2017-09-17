<?php

namespace Movies;

use Movies\Action\{
    RenderMoviesAction,
    RenderMoviesActionDelegatorFactory,
    RenderMoviesActionFactory,
    RenderMoviesActionPipelineFactory,
    RenderMoviesActionPipelineWithTraitFactory
};
use Movies\Middleware\AuthenticationMiddleware;
use Movies\Middleware\AuthorizationMiddleware;
use Movies\Services\FileMovieDataService;
use Movies\Services\Database\{TableAbstractFactory,TableGatewayAbstractFactory};

/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
                AuthenticationMiddleware::class => AuthenticationMiddleware::class,
                AuthorizationMiddleware::class => AuthorizationMiddleware::class,
                'MovieData' => FileMovieDataService::class,
            ],
            'abstract_factories' => [
                TableAbstractFactory::class,
                TableGatewayAbstractFactory::class,
            ],
            'factories'  => [
                RenderMoviesAction::class => RenderMoviesActionFactory::class,
                RenderMoviesActionPipelineFactory::class => RenderMoviesActionPipelineFactory::class,
                RenderMoviesActionPipelineWithTraitFactory::class => RenderMoviesActionPipelineWithTraitFactory::class
            ],
            'delegators' => [
                /*Action\RenderMoviesAction::class => [
                    RenderMoviesActionDelegatorFactory::class,
                ]*/
            ],
            'services' => []
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'movies'    => [__DIR__ . '/../templates/movies'],
            ],
        ];
    }
}
