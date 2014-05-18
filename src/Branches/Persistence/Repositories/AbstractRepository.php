<?php

namespace Branches\Persistence\Repositories;

use Doctrine\ORM\EntityManager;
use Branches\Domain\Model\AbstractEntity;
use Branches\Domain\Repository\RepositoryInterface;

/**
 * Class AbstractRepository
 * @package Branches\Persistence\Repositories
 */
abstract class AbstractRepository implements RepositoryInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var string
     */
    protected $entityType;

    /**
     * @throws \DomainException
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        if (!class_exists($this->entityType)) {
            throw new \DomainException('protected property $type must specify fully qualified Entity class name');
        }

        $this->entityManager = $em;
    }

    /**
     * @param int $id
     * @return \Branches\Domain\Model\AbstractEntity
     */
    public function getById($id)
    {
        return $this->entityManager->find($this->entityType, $id);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->entityManager->getRepository($this->entityType)->findAll();
    }

    /**
     *
     * @param \Branches\Domain\Model\AbstractEntity $entity
     * @return $this
     */
    public function persist(AbstractEntity $entity)
    {
        $this->entityManager->persist($entity);
        return $this;
    }

    /**
     * @return $this
     */
    public function flush()
    {
        $this->entityManager->flush();
        return $this;
    }

    /**
     *
     * @param int $id
     * @return $this
     */
    public function delete($id)
    {
        $entity = $this->getById($id);
        $this->entityManager->remove($entity);
        return $this;
    }
}
