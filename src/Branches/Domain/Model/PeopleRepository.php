<?php
/**
 *
 */

namespace Branches\Domain\Model\Person;

use Branches\Domain\Model\Entity;
use Branches\Domain\Model\Repository;

interface PeopleRepository extends Repository
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
