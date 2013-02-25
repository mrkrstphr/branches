<?php
/**
 *
 */

namespace Branches\Domain\Repository;

use Branches\Domain\Model\Entity;

interface SourceRepositoryInterface extends RepositoryInterface
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
     * @return SourceRepositoryInterface
     */
    public function store(Entity $entity);

    /**
     *
     * @param int $id
     * @return SourceRepositoryInterface
     */
    public function delete($id);
}
