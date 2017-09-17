<?php
namespace Movies\Services\Database;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\AbstractFactoryInterface;

/**
 * Class TableAbstractFactory
 * @package App\ServiceManager\AbstractFactory
 */
class TableAbstractFactory implements AbstractFactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @return bool
     */
    public function canCreate(ContainerInterface $container, $requestedName) {
        return (fnmatch('*Table', $requestedName));
    }

    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return bool
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        if (class_exists($requestedName)) {
            $tableGateway = $requestedName . 'Gateway';
            return new $requestedName($container->get($tableGateway));
        }

        return false;
    }
}
