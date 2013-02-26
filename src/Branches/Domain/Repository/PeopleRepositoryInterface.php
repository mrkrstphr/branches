<?php
/**
 *
 */

namespace Branches\Domain\Repository;

use Branches\Domain\Model\Entity;

interface PeopleRepositoryInterface extends RepositoryInterface
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
     * @return PeopleRepositoryInterface
     */
    public function store(Entity $entity);

    /**
     *
     * @param int $id
     * @return PeopleRepositoryInterface
     */
    public function delete($id);

    /**
     * @param int $offset
     * @param int $limit
     * @return array
     */
    public function getList($offset = 0, $limit = 20);
}
