<?php

namespace Branches\Persistence\Repository;

use RuntimeException;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class RepositoryFactory
 * @package Branches\Domain\Repository
 */
class RepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $class = func_get_arg(2);
        $class = str_replace('Branches\\', 'Branches\\Persistence\\', $class);

        if (class_exists($class, true)) {
            return new $class($sl->get('Doctrine\ORM\EntityManager'));
        }

        throw new RuntimeException('Unknown Repository requested: ' . $class);
    }
}
