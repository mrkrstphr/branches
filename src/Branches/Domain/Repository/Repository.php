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
     * @param int $id
     * @return Entity
     */
    public function getById($id);

    /**
     * @param Entity $entity
     * @return Repository
     */
    public function store(Entity $entity);

    /**
     * @param int $id
     * @return Repository
     */
    public function delete($id);

    /**
     * @return Repository
     */
    public function flush();
}
