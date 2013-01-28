<?php
/**
 * 
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Branches\Domain\Model\Person\PeopleRepository;

/**
 *
 */
class PeopleController extends AbstractActionController
{
    /**
     *
     * @var \Branches\Domain\Model\Person\PeopleRepository
     */
    protected $_people;

    /**
     *
     * @param \Branches\Domain\Model\Person\PeopleRepository $people
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
}