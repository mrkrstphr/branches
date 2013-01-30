<?php
/**
 *
 */

namespace Branches\Persistence\Repositories;

use Branches\Domain\Repository\Repository,
    Branches\Domain\Model\Entity,
    Branches\Persistence\EntityManagerFactory,
    Doctrine\ORM\EntityManager;

/**
 *
 */
abstract class RepositoryBase implements Repository
{
    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    protected $_manager;

    /**
     *
     * @var string
     */
    protected $_type;

    /**
     *
     * @throws \DomainException
     * @throws \InvalidArgumentException
     * @param \Doctrine\ORM\EntityManager $em
     */
    public function __construct(EntityManager $em = null)
    {
        if (!class_exists($this->_type)) {
            throw new \DomainException('protected property $type must specify fully qualified Entity class name');
        }

        if (is_null($em)) {
            $em = EntityManagerFactory::getSingleton();
        }

        if (!is_a($em, 'Doctrine\\ORM\\EntityManager')) {
            throw new \InvalidArgumentException(
                'Repository must be constructed with an instance of Doctrine\\ORM\\EntityManager'
            );
        }

        $this->_manager = $em;
    }

    /**
     *
     * @param int $id
     * @return \Branches\Domain\Model\Entity
     */
    public function getById($id)
    {
        return $this->_manager->find($this->_type, $id);
    }

    /**
     *
     * @return array
     */
    public function getAll()
    {
        return $this->_manager->getRepository($this->_type)
            ->findAll();
    }

    /**
     *
     * @param $conditions
     * @return array
     */
    public function getBy($conditions)
    {
        return $this->_manager->getRepository($this->_type)
            ->findBy($conditions);
    }

    /**
     *
     * @param \Branches\Domain\Model\Entity $entity
     */
    public function store(Entity $entity)
    {
        $this->verifyType($entity);
        $this->_manager->persist($entity);
    }

    /**
     *
     * @param int $id
     */
    public function delete($id)
    {
        $entity = $this->get($id);
        $this->_manager->remove($entity);
    }

    /**
     *
     * @param \Branches\Domain\Model\Entity $entity
     * @throws \DomainException
     */
    private function verifyType($entity)
    {
        if (!is_a($entity, $this->_type)) {
            throw new \DomainException("$entity is not an instance of {$this->_type}");
        }
    }
}
