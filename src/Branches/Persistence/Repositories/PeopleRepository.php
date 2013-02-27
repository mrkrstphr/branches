<?php
/**
 *
 */

namespace Branches\Persistence\Repositories;

use Doctrine\ORM\Tools\Pagination\Paginator;
use Branches\Domain\Model\Person;
use Branches\Domain\Repository\PeopleRepositoryInterface;

/**
 *
 */
class PeopleRepository extends RepositoryAbstract implements PeopleRepositoryInterface
{
    /**
     *
     * @var string
     */
    protected $type = 'Branches\\Domain\\Model\\Person';

    /**
     * @param int $offset
     * @param int $limit
     * @return Paginator
     */
    public function getList($offset = 0, $limit = 20)
    {
        $dql = 'SELECT p, n, e FROM Branches\\Domain\\Model\\Person p ' .
            'JOIN p.names n ' .
            'LEFT JOIN p.events e ' .
            'ORDER BY n.surname, n.givenName ASC';

        $query = $this->manager->createQuery($dql)
            ->setMaxResults(20)
            ->setFirstResult($offset);

        $paginator = new Paginator($query, $fetchJoinCollection = true);

        return $paginator;
    }
}
