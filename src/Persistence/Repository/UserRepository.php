<?php

namespace Branches\Persistence\Repository;

use Branches\Domain\Repository\UserRepositoryInterface;

/**
 * Class UserRepository
 * @package Branches\Persistence\Repository
 */
class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    /**
     * @var string
     */
    protected $entityClass = 'Branches\Domain\Entity\User';
}
