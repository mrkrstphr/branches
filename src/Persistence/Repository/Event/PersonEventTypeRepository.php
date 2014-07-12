<?php

namespace Branches\Persistence\Repository\Event;

use Branches\Domain\Repository\Event\PersonEventTypeRepositoryInterface;
use Branches\Persistence\Repository\AbstractRepository;

/**
 * Class PersonEventTypeRepository
 * @package Branches\Persistence\Repository\Event
 */
class PersonEventTypeRepository extends AbstractRepository implements PersonEventTypeRepositoryInterface
{
    /**
     * @var string
     */
    protected $entityClass = 'Branches\Domain\Entity\Event\PersonEventType';
}
