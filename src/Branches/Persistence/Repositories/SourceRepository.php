<?php
/**
 *
 */

namespace Branches\Persistence\Repositories;

use Branches\Domain\Repository\LocationRepositoryInterface;

/**
 *
 */
class SourceRepository extends RepositoryAbstract implements LocationRepositoryInterface
{
    /**
     *
     * @var string
     */
    protected $type = 'Branches\\Domain\\Model\\Source';
}
