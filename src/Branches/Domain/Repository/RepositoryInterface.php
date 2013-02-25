<?php
/**
 *
 */

namespace Branches\Domain\Repository;

use Branches\Domain\Model\Entity;

/**
 *
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
    public function store(Entity $entity);

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
