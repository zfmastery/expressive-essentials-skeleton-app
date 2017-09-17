<?php

namespace Movies\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Zend\Expressive\Router\RouteResult;

/**
 * Class LoggingMiddleware
 * @package Movies\Middleware
 */
class LoggingMiddleware implements MiddlewareInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * LoggingMiddleware constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * {@inheritDoc}
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        // Log the requested route
        $this->logger->info(
            ($request->getAttribute(RouteResult::class))
                ->getMatchedRouteName()
        );

        // All processing of any further middleware in the pipeline
        return $delegate->process($request);
    }
}
