<?php

namespace Branches\Persistence\Repository\Person;

use Branches\Domain\Repository\Person\EventRepositoryInterface;
use Branches\Persistence\Repository\AbstractRepository;

/**
 * Class EventRepository
 * @package Branches\Persistence\Repository\Person
 */
class EventRepository extends AbstractRepository implements EventRepositoryInterface
{
    /**
     * @var string
     */
    protected $entityClass = 'Branches\Domain\Entity\Person\Event';
}
