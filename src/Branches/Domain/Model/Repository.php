<?php
/**
 *
 */

namespace Branches\Domain\Model;

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
