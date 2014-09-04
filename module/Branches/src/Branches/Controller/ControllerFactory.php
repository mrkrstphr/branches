<?php

namespace Branches\Controller;

use Branches\Controller\People\AttributesController;
use Branches\Controller\People\EventsController;
use Branches\Form\People\AttributeForm;
use Branches\Form\People\EventForm;
use Branches\Persistence\Stdlib\Hydrator\ObjectHydrator;
use RuntimeException;
use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ControllerFactory
 * @package Branches\Controller
 */
class ControllerFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $sl
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        $alias = func_get_arg(1);

        if (!method_exists($this, 'create' . $alias)) {
            throw new RuntimeException('Unable to create controller ' . func_get_arg(2));
        }

        return $this->{'create' . $alias}($sl);
    }

    /**
     * @param ControllerManager $cm
     * @return DashboardController
     */
    public function createBranchesControllerDashboard(ControllerManager $cm)
    {
        return new DashboardController();
    }

    /**
     * @param ControllerManager $cm
     * @return PeopleController
     */
    public function createBranchesControllerPeople(ControllerManager $cm)
    {
        return new PeopleController(
            $cm->getServiceLocator()->get('Branches\Repository\PersonRepository')
        );
    }

    /**
     * @param ControllerManager $cm
     * @return AttributesController
     */
    public function createBranchesControllerPeopleAttributes(ControllerManager $cm)
    {
        $hydrator = new ObjectHydrator($cm->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
        $form = new AttributeForm($cm->getServiceLocator()->get('Branches\Repository\Person\AttributeTypeRepository'));
        $form->setHydrator($hydrator);

        return new AttributesController(
            $cm->getServiceLocator()->get('Branches\Repository\PersonRepository'),
            $form
        );
    }

    /**
     * @param ControllerManager $cm
     * @return AttributesController
     */
    public function createBranchesControllerPeopleEvents(ControllerManager $cm)
    {
        $hydrator = new ObjectHydrator($cm->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
        $form = new EventForm($cm->getServiceLocator()->get('Branches\Repository\Event\PersonEventTypeRepository'));
        $form->setHydrator($hydrator);

        return new EventsController(
            $cm->getServiceLocator()->get('Branches\Repository\PersonRepository'),
            $cm->getServiceLocator()->get('Branches\Repository\Person\EventRepository'),
            $form,
            $cm->getServiceLocator()->get('Branches\Form\SourceCitation')
        );
    }

    /**
     * @param ControllerManager $cm
     * @return DashboardController
     */
    public function createBranchesControllerPlaces(ControllerManager $cm)
    {
        return new PlacesController(
            $cm->getServiceLocator()->get('Branches\Repository\Place\PlaceRepository'),
            $cm->getServiceLocator()->get('Branches\Service\Json\Serializer')
        );
    }
}
