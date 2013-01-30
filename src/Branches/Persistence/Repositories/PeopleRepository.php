<?php
/**
 *
 */

namespace Branches\Persistence\Repositories;

use Branches\Domain\Repository\PeopleRepository as IRepository;

/**
 *
 */
class PeopleRepository extends RepositoryBase implements IRepository
{
    /**
     *
     * @var string
     */
    protected $_type = 'Branches\\Domain\\Model\\Person';

}
