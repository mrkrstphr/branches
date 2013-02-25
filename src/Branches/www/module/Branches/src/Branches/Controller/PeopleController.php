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
    protected $_people;

    /**
     *
     * @param PeopleRepositoryInterface $people
     */
    public function __construct(PeopleRepositoryInterface $people)
    {
        $this->_people = $people;
    }

    /**
     *
     */
    public function indexAction()
    {
        $person = $this->_people->getById(14);
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
