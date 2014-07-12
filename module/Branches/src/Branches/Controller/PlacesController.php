<?php

namespace Branches\Controller;

use Branches\Domain\Repository\Place\PlaceRepositoryInterface;
use Branches\Domain\Service\Json\SerializerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

/**
 * Class PlacesController
 * @package Branches\Controller
 */
class PlacesController extends AbstractActionController
{
    /**
     * @var PlaceRepositoryInterface
     */
    protected $placeRepository;

    /**
     * @var SerializerInterface
     */
    protected $serializer;

    /**
     * @param PlaceRepositoryInterface $placeRepository
     * @param SerializerInterface $serializer
     */
    public function __construct(PlaceRepositoryInterface $placeRepository, SerializerInterface $serializer)
    {
        $this->placeRepository = $placeRepository;
        $this->serializer = $serializer;
    }

    /**
     * @return JsonModel
     */
    public function listJsonAction()
    {
        $query = $this->params()->fromQuery('q');

        $places = $this->placeRepository->getPlacesLike($query);

        return new JsonModel(json_decode($this->serializer->serialize($places), true));
    }
}
