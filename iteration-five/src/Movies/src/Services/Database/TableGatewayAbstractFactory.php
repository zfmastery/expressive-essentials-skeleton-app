<?php

namespace Movies\Services\Database;

use Movies\Entities\Movie;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\ArraySerializable;
use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\NamingStrategy\MapNamingStrategy;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

class TableGatewayAbstractFactory implements AbstractFactoryInterface
{
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        if (fnmatch('*TableGateway', $requestedName)) {
            return true;
        }

        return false;
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $dbAdapter = $container->get(Adapter::class);
        $tableGateway = null;

        if ($requestedName === 'Movies\Services\Database\MovieTableGateway') {
            $hydrator = new ClassMethods();
            $hydrator->setNamingStrategy(
                new MapNamingStrategy(
                    [
                        'title' => 'title',
                        'director' => 'director',
                        'release_date' => 'releaseDate',
                        'stars' => 'stars',
                        'synopsis' => 'synopsis',
                        'genre' => 'genre',
                    ]
                )
            );

            $tableGateway = new TableGateway(
                'tblmovies',
                $dbAdapter,
                null,
                new HydratingResultSet($hydrator, new Movie())
            );
        }

        return $tableGateway;
    }
}
