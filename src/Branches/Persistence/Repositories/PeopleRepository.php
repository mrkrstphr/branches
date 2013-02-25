<?php
/**
 *
 */

namespace Branches\Persistence\Repositories;

use Branches\Domain\Repository\PeopleRepositoryInterface;

/**
 *
 */
class PeopleRepository extends RepositoryBase implements PeopleRepositoryInterface
{
    /**
     *
     * @var string
     */
    protected $type = 'Branches\\Domain\\Model\\Person';
}
