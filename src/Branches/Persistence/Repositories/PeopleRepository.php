<?php
/**
 *
 */

namespace Branches\Persistence\Repositories;

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
     * @return array
     */
    public function getList($offset = 0, $limit = 20)
    {
        $dql = 'SELECT p, n, e FROM Branches\\Domain\\Model\\Person p ' .
            'JOIN p.names n ' .
            'LEFT JOIN p.events e ' .
            'ORDER BY n.surname, n.givenName ASC';

        $query = $this->manager->createQuery($dql);
        $query->setMaxResults($limit);
        $query->setFirstResult($offset);
        $people = $query->getResult();

        return $people;
    }
}
