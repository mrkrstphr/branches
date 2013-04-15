<?php

namespace Branches\Domain\Repository;

use Branches\Domain\Model\Entity;

/**
 * Class RepositoryInterface
 * @package Branches\Domain\Repository
 */
interface RepositoryInterface
{
    /**
     * @param int $id
     * @return Entity
     */
    public function getById($id);

    /**
     * @param Entity $entity
     * @return RepositoryInterface
     */
    public function persist(Entity $entity);

    /**
     * @param int $id
     * @return RepositoryInterface
     */
    public function delete($id);

    /**
     * @return RepositoryInterface
     */
    public function flush();
}
