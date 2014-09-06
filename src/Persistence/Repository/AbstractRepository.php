<?php

namespace Branches\Persistence\Repository;

use Doctrine\DBAL\Query\QueryBuilder;
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

    /**
     * {@inheritDoc}
     */
    public function getBy(array $conditions = [], array $sort = [], $limit = null, $offset = null)
    {
        return $this->entityManager->getRepository($this->entityClass)->findBy($conditions, $sort, $limit, $offset);
    }

    /**
     * {@inheritDoc}
     */
    public function getList($key, $label)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $builder->select('a.' . $key, 'a.' . $label)
            ->from($this->entityClass, 'a')
            ->orderBy('a.' . $label);

        $rows = $builder->getQuery()->getArrayResult();

        $results = [];

        foreach ($rows as $row) {
            $results[$row[$key]] = $row[$label];
        }

        return $results;
    }

    /**
     * {@inheritDoc}
     */
    public function persist($entity)
    {
        $this->entityManager->persist($entity);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function remove($entity)
    {
        $this->getEntityManager()->remove($entity);
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function flush()
    {
        $this->entityManager->flush();
        return $this;
    }
}
