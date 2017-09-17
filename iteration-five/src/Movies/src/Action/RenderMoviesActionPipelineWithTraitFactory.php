<?php

namespace Movies\Action;

use Interop\Container\ContainerInterface;
use Movies\Middleware\SecureAccessPipelineTrait;

class RenderMoviesActionPipelineWithTraitFactory
{
    use SecureAccessPipelineTrait;

    public function __invoke(ContainerInterface $container)
    {
        $nested = $this->createPipeline($container);
        $nested->pipe(RenderMoviesAction::class);

        return $nested;
    }
}
