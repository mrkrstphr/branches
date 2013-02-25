<?php
/**
 *
 */

namespace Branches\Persistence\Repositories;

use Branches\Domain\Repository\LocationRepositoryInterface;

/**
 *
 */
class LocationRepository extends RepositoryAbstract implements LocationRepositoryInterface
{
    /**
     *
     * @var string
     */
    protected $type = 'Branches\\Domain\\Model\\Location';
}
