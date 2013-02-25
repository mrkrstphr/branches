<?php
/**
 *
 */

namespace Branches\Domain\Repository;

use Branches\Domain\Model\Entity;

interface LocationRepositoryInterface extends RepositoryInterface
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
     * @return LocationRepositoryInterface
     */
    public function store(Entity $entity);

    /**
     *
     * @param int $id
     * @return LocationRepositoryInterface
     */
    public function delete($id);
}
