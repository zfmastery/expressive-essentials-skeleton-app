<?php

namespace Movies\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Movies\BasicRenderer;
use Psr\Http\Message\{ResponseInterface,ServerRequestInterface};
use Zend\Diactoros\Response\HtmlResponse;

/**
 * Class RenderMoviesMiddleware
 * @package Movies\Middleware
 */
class RenderMoviesMiddleware
{
    /**
     * @var arary|\Traversable
     */
    private $movieData;

    /**
     * RenderMoviesMiddleware constructor.
     * @param array|\Traversable $movieData
     */
    public function __construct($movieData)
    {
        $this->movieData = $movieData;
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return ResponseInterface
     * @internal param ResponseInterface $response
     * @internal param $next
     */
    public function __invoke(
        ServerRequestInterface $request,
        DelegateInterface $delegate
    ) {
        $renderer = (new BasicRenderer())(
            $this->movieData
        );
        return new HtmlResponse($renderer);
    }
}
