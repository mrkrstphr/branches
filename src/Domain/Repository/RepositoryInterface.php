<?php

namespace Branches\Domain\Repository;

/**
 * Interface RepositoryInterface
 * @package Branches\Domain\Repository
 */
interface RepositoryInterface
{
    public function getById($id);
    public function getBy(array $conditions = [], array $sort = [], $limit = null, $offset = null);

    public function getList($key, $label);

    /**
     * @param mixed $entity
     * @return $this
     */
    public function persist($entity);

    /**
     * @return $this
     */
    public function flush();
}
