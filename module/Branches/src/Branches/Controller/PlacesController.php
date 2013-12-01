<?php

namespace Branches\Controller;

use JMS\Serializer\Serializer;
use Zend\Mvc\Controller\AbstractActionController;
use Branches\Domain\Repository\LocationRepositoryInterface;

/**
 * Class PlacesController
 * @package Branches\Controller
 */
class PlacesController extends AbstractActionController
{
    /**
     * @var LocationRepositoryInterface
     */
    protected $repository;

    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @param LocationRepositoryInterface $locations
     * @param Serializer $serializer
     */
    public function __construct(LocationRepositoryInterface $locations, Serializer $serializer)
    {
        $this->repository = $locations;
        $this->serializer = $serializer;
    }

    /**
     * Displays a list of places with a paginator, defaulting to 20 per page.
     */
    public function indexAction()
    {
        $places = $this->repository->getAll();

        $jsonContent = $this->serializer->serialize($places, 'json');

        echo $jsonContent;
        exit; // todo fixme
    }

    /**
     * @return \Zend\View\Model\ViewModel
     */
    public function viewAction()
    {
        $id = $this->params('id');

        $location = $this->repository->getById($id);

        $jsonContent = $this->serializer->serialize($location, 'json');

        echo $jsonContent;
        exit; // todo fixme
    }
}
