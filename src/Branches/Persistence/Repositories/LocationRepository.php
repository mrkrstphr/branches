<?php
/**
 *
 */

namespace Branches\Persistence\Repositories;

use Doctrine\ORM\Tools\Pagination\Paginator;
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

    /**
     * @param int $offset
     * @param int $limit
     * @return Paginator
     */
    public function getPaginator($offset = 0, $limit = 20)
    {
        $dql = 'SELECT p FROM ' . $this->type . ' p ORDER BY p.description ASC';

        $query = $this->manager->createQuery($dql)
            ->setMaxResults($limit)
            ->setFirstResult($offset);

        $paginator = new Paginator($query);

        return $paginator;
    }
}
