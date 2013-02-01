<?php
/**
 * 
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Branches\Domain\Repository\PeopleRepository;

/**
 *
 */
class PeopleController extends AbstractActionController
{
    /**
     *
     * @var \Branches\Domain\Repository\PeopleRepository
     */
    protected $_people;

    /**
     *
     * @param \Branches\Domain\Repository\PeopleRepository $people
     */
    public function __construct(PeopleRepository $people)
    {
        $this->_people = $people;
    }

    /**
     *
     */
    public function indexAction()
    {
        return new ViewModel();
    }

    /**
     *
     */
    public function viewAction()
    {
        return new ViewModel();
    }
}
