<?php

namespace Branches\Controller;

use Branches\Domain\Repository\PersonRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class PeopleController
 * @package Branches\Controller
 */
class PeopleController extends AbstractActionController
{
    /**
     * @var PersonRepositoryInterface
     */
    protected $personRepository;

    /**
     * @param PersonRepositoryInterface $personRepository
     */
    public function __construct(PersonRepositoryInterface $personRepository) {
        $this->personRepository = $personRepository;
    }

    /**
     * @return array
     */
    public function viewAction()
    {
        $id = $this->params()->fromRoute('id');
        $person = $this->personRepository->getById($id);

        return [
            'person' => $person
        ];
    }
}
