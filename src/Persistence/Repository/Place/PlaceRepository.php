<?php

namespace Branches\Persistence\Repository\Place;

use Branches\Domain\Repository\Place\PlaceRepositoryInterface;
use Branches\Persistence\Repository\AbstractRepository;

/**
 * Class PlaceRepository
 * @package Branches\Persistence\Repository\Place
 */
class PlaceRepository extends AbstractRepository implements PlaceRepositoryInterface
{
    /**
     * @var string
     */
    protected $entityClass = 'Branches\Domain\Entity\Place\Place';
}
