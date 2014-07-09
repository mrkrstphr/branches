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
        $factory = 'create' . func_get_arg(1);

        if (method_exists($this, $factory)) {
            return $this->$factory($sl);
        }

        throw new RuntimeException('Unknown Repository requested: ' . $class);
    }

    public function createBranchesRepositoryPersonRepository(ServiceLocatorInterface $sl)
    {
        return new PersonRepository(
            $sl->get('Doctrine\ORM\EntityManager')
        );
    }
}
