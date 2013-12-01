<?php
/**
 * 
 */

namespace Branches\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Paginator\Paginator;
use Zend\View\Model\ViewModel;
use Branches\Domain\Repository\PeopleRepositoryInterface;
use Branches\Paginator\DoctrinePaginatorAdapter;

/**
 *
 */
class PeopleController extends AbstractActionController
{
    /**
     *
     * @var PeopleRepositoryInterface
     */
    protected $repository;

    /**
     *
     * @param PeopleRepositoryInterface $people
     */
    public function __construct(PeopleRepositoryInterface $people)
    {
        $this->repository = $people;
    }

    /**
     * Displays a list of individuals with a paginator, defaulting to 20 per page.
     */
    public function indexAction()
    {
        $page = $this->params('page');
        $max = 20;

        $people = $this->repository->getPaginator(($page - 1) * 20, $max);

        $adapter = new DoctrinePaginatorAdapter($people);
        $paginator = new Paginator($adapter);
        $paginator->setCurrentPageNumber($page);
        $paginator->setItemCountPerPage($max);

        return array(
            'paginator' => $paginator
        );
    }

    /**
     *
     */
    public function viewAction()
    {
        $id = $this->params('id');

        $person = $this->repository->getById($id);

        return array(
            'person' => $person
        );
    }
}
