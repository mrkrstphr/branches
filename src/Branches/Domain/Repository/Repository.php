<?php
/**
 *
 */

namespace Branches\Domain\Repository;

use Branches\Domain\Model\Entity;

/**
 *
 */
interface Repository
{
    /**
     *
     * @param int $id
     * @return Entity
     */
    public function getById($id);

    /**
     *
     * @param Entity $entity
     */
    public function store(Entity $entity);

    /**
     *
     * @param int $id
     */
    public function delete($id);
}
