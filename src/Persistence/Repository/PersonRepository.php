<?php

namespace Branches\Persistence\Repository;

use Branches\Domain\Repository\PersonRepositoryInterface;

/**
 * Class PersonRepository
 * @package Branches\Persistence\Repository
 */
class PersonRepository extends AbstractRepository implements PersonRepositoryInterface
{
    /**
     * @var string
     */
    protected $entityClass = 'Branches\Domain\Entity\Person\Person';
}
