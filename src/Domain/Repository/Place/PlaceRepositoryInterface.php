<?php

namespace Branches\Domain\Repository\Place;

use Branches\Domain\Repository\RepositoryInterface;

/**
 * Interface PlaceRepositoryInterface
 * @package Branches\Persistence\Repository\Place
 */
interface PlaceRepositoryInterface extends RepositoryInterface
{
    /**
     * @param string $query
     * @return array
     */
    public function getPlacesLike($query);
}
