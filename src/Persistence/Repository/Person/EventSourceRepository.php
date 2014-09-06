<?php

namespace Branches\Persistence\Repository\Person;

use Branches\Domain\Repository\Person\EventSourceRepositoryInterface;
use Branches\Persistence\Repository\AbstractRepository;

/**
 * Class EventSourceRepository
 * @package Branches\Persistence\Repository\Person
 */
class EventSourceRepository extends AbstractRepository implements EventSourceRepositoryInterface
{
    /**
     * @var string
     */
    protected $entityClass = 'Branches\Domain\Entity\Person\EventSource';
}
