<?php

namespace Movies\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Psr\Http\Message\{ResponseInterface,ServerRequestInterface};
use Zend\Diactoros\Response\JsonResponse;

class ApiAction
{
    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param $next
     * @return ResponseInterface
     */
    public function __invoke(
        ServerRequestInterface $request,
        DelegateInterface $delegate
    ) {
        return new JsonResponse(require_once('data/movies.php'));
    }
}
