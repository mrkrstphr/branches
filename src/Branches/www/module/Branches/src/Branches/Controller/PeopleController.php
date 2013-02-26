<?php
/**
 * 
 */

namespace Branches\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Branches\Domain\Repository\PeopleRepositoryInterface;

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
     *
     */
    public function indexAction()
    {
        $people = $this->repository->getList();

        return array(
            'people' => $people
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
