<?php

namespace Movies\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\{ResponseInterface,ServerRequestInterface};
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;

/**
 * Class RenderMoviesAction
 * @package Movies\Middleware
 */
class RenderMoviesAction implements ServerMiddlewareInterface
{
    /**
     * @var array
     */
    private $movieData;

    /** @var Router\RouterInterface  */
    private $router;

    /** @var Template\TemplateRendererInterface  */
    private $template;

    /**
     * RenderMoviesAction constructor.
     * @param $movieData
     * @param Router\RouterInterface $router
     * @param Template\TemplateRendererInterface $template
     * @internal param ClientInterface $client
     */
    public function __construct(
        $movieData,
        Router\RouterInterface $router,
        Template\TemplateRendererInterface $template
    ) {
        $this->router   = $router;
        $this->template = $template;
        $this->movieData = $movieData;
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return ResponseInterface
     * @internal param ResponseInterface $response
     * @internal param $next
     */
    public function process(
        ServerRequestInterface $request,
        DelegateInterface $delegate
    ) {

        $data = [
            'movies' => $this->movieData->fetchAll()
        ];

        return new HtmlResponse(
            $this->template->render(
                'movies::render-movies',
                $data
            )
        );
    }
}
