<?php

namespace Branches\Persistence\Repository;

use RuntimeException;
use Branches\Domain\Repository\RepositoryInterface;
use Doctrine\ORM\EntityManager;

/**
 * Class AbstractRepository
 * @package Branches\Persistence\Repository
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var string
     */
    protected $entityClass;

    /**
     * @param EntityManager $em
     * @throws RuntimeException
     */
    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;

        if (empty($this->entityClass)) {
            throw new RuntimeException('EntityClass must be specified for Repository');
        }
    }

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * @param EntityManager $entityManager
     * @return $this
     */
    public function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
        return $this;
    }

    /**
     * @return string
     */
    public function getEntityClass()
    {
        return $this->entityClass;
    }

    /**
     * {@inheritDoc}
     */
    public function getById($id)
    {
        return $this->entityManager->find($this->entityClass, $id);
    }
}
