<?php
/**
 * Expressive routed middleware
 */

/** @var \Zend\Expressive\Application $app */
$app->get('/', \Movies\Middleware\RenderMoviesMiddleware::class); // <1>
// $app->route('/', \Movies\Middleware\RenderMoviesMiddleware::class, ['GET']); // <2>
