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
        $pageNumber = $this->params('page');
        $perPage = 20;

        $people = $this->repository->getList(($pageNumber - 1) * 20, $perPage);

        $adapter = new DoctrinePaginatorAdapter($people);
        $paginator = new Paginator($adapter);
        $paginator->setCurrentPageNumber($pageNumber);
        $paginator->setItemCountPerPage(20);

        return array(
            'paginator' => $paginator
        );
    }

    /**
     *
     */
    public function viewAction()
    {
        return new ViewModel();
    }
}
