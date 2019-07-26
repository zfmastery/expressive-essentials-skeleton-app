<?php


namespace Movies\Services\Database;

use Interop\Container\ContainerInterface;
use Zend\Db\TableGateway\TableGateway;

class MovieTableFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new MovieTable($container->get('Movies\Services\Database\MovieTableGateway'));
    }
}
