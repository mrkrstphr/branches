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

    /**
     * @param string $query
     * @return array
     */
    public function getPlacesLike($query)
    {
        $builder = $this->getEntityManager()->createQueryBuilder();
        $builder->select('place')
            ->from($this->entityClass, 'place')
            ->where($builder->expr()->like('LOWER(place.description)', 'LOWER(:place)'))
            ->setParameter('place', '%' . $query . '%');

        return $builder->getQuery()->getResult();
    }
}
