<?php
/**
 * 
 */

namespace Branches\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Paginator\Paginator;
use Zend\View\Model\ViewModel;
use Branches\Domain\Repository\LocationRepositoryInterface;
use Branches\Paginator\DoctrinePaginatorAdapter;

/**
 *
 */
class PlacesController extends AbstractActionController
{
    /**
     * @var LocationRepositoryInterface
     */
    protected $repository;

    /**
     * @param LocationRepositoryInterface $locations
     */
    public function __construct(LocationRepositoryInterface $locations)
    {
        $this->repository = $locations;
    }

    /**
     * Displays a list of places with a paginator, defaulting to 20 per page.
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
     * @return \Zend\View\Model\ViewModel
     */
    public function viewAction()
    {
        $id = $this->params('id');

        $location = $this->repository->getById($id);

        $form = $this->getServiceLocator()->get('LocationForm');

        return array(
            'form' => $form,
            'location' => $location
        );
    }
}
