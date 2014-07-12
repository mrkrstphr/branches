<?php

namespace Branches\Controller;

use Branches\Form\People\EventForm;
use Branches\Persistence\Stdlib\Hydrator\ObjectHydrator;
use RUntimeException;
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
        $hydrator = new ObjectHydrator($cm->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
        $form = new EventForm($cm->getServiceLocator()->get('Branches\Repository\Event\PersonEventTypeRepository'));
        $form->setHydrator($hydrator);

        return new PeopleController(
            $form,
            $cm->getServiceLocator()->get('Branches\Repository\PersonRepository'),
            $cm->getServiceLocator()->get('Branches\Repository\Person\EventRepository'),
            $cm->getServiceLocator()->get('Branches\Repository\Place\PlaceRepository')
        );
    }

    /**
     * @param ControllerManager $cm
     * @return DashboardController
     */
    public function createBranchesControllerPlaces(ControllerManager $cm)
    {
        return new PlacesController();
    }
}
