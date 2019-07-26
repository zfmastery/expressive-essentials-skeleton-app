<?php

namespace Movies\Services\Database;

use Movies\Entities\Movie;
use Interop\Container\ContainerInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Hydrator\ArraySerializable;
use Zend\Hydrator\ClassMethods;
use Zend\Hydrator\ClassMethodsHydrator;
use Zend\Hydrator\NamingStrategy\MapNamingStrategy;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

/**
 * Class TableGatewayAbstractFactory
 * @package Movies\Services\Database
 */
class TableGatewayAbstractFactory implements AbstractFactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @return bool
     */
    public function canCreate(ContainerInterface $container, $requestedName)
    {
        if (fnmatch('*TableGateway', $requestedName)) {
            return true;
        }

        return false;
    }

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|TableGateway|null
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $dbAdapter = $container->get(Adapter::class);
        $tableGateway = null;

        if ($requestedName === 'Movies\Services\Database\MovieTableGateway') {
            $hydrator = new ClassMethodsHydrator();
            $hydrator->setNamingStrategy(
                MapNamingStrategy::createFromHydrationMap(
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
