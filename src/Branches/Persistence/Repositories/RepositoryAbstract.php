<?php
/**
 *
 */

namespace Branches\Persistence\Repositories;

use Doctrine\ORM\EntityManager;
use Branches\Domain\Model\Entity;
use Branches\Domain\Repository\RepositoryInterface;
use Branches\Persistence\EntityManagerFactory;

/**
 *
 */
abstract class RepositoryAbstract implements RepositoryInterface
{
    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $manager;

    /**
     *
     * @var string
     */
    protected $type;

    /**
     *
     * @throws \DomainException
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        if (!class_exists($this->type)) {
            throw new \DomainException('protected property $type must specify fully qualified Entity class name');
        }

        $this->manager = $em;
    }

    /**
     *
     * @param int $id
     * @return \Branches\Domain\Model\Entity
     */
    public function getById($id)
    {
        return $this->manager->find($this->type, $id);
    }

    /**
     *
     * @return array
     */
    public function getAll()
    {
        return $this->manager->getRepository($this->type)->findAll();
    }

    /**
     *
     * @param $conditions
     * @return array
     */
    public function getBy($conditions)
    {
        return $this->manager->getRepository($this->type)->findBy($conditions);
    }

    /**
     *
     * @param \Branches\Domain\Model\Entity $entity
     * @return RepositoryBase
     */
    public function persist(Entity $entity)
    {
        $this->verifyType($entity);
        $this->manager->persist($entity);
        return $this;
    }

    /**
     * @return RepositoryBase
     */
    public function flush()
    {
        $this->manager->flush();
        return $this;
    }

    /**
     *
     * @param int $id
     * @return RepositoryBase
     */
    public function delete($id)
    {
        $entity = $this->getById($id);
        $this->manager->remove($entity);
        return $this;
    }

    /**
     *
     * @param \Branches\Domain\Model\Entity $entity
     * @throws \DomainException
     */
    private function verifyType($entity)
    {
        if (!is_a($entity, $this->type)) {
            throw new \DomainException("$entity is not an instance of {$this->type}");
        }
    }
}
