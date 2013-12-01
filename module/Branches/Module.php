<?php

namespace Branches;

use Zend\Mvc\Controller\ControllerManager;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceManager;
use Branches\Controller\PeopleController;
use Branches\Controller\PlacesController;
use Branches\Form\LocationForm;
use Branches\Persistence\ConfigurationFactory;
use Branches\Persistence\EntityManagerFactory;
use Branches\Persistence\Repositories\LocationRepository;
use Branches\Persistence\Repositories\PeopleRepository;

/**
 * Class Module
 * @package Branches
 */
class Module
{
    /**
     * @param \Zend\Mvc\MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @throws \Exception
     * @return array
     */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'EntityManager' => function (ServiceManager $sm) {
                    $config = $sm->get('Config');

                    if (!isset($config['doctrine'])) {
                        throw new \Exception(
                            'Doctrine database connection information is not configured. See ' .
                            '[config/autoload/db.local.php.dist] for a sample configuration.'
                        );
                    }

                    $configManager = new ConfigurationFactory();
                    $configManager->loadConfiguration($config['doctrine']);

                    $entityFactory = new EntityManagerFactory($configManager);
                    $manager = $entityFactory->getSingleton();

                    return $manager;
                },
                'PeopleRepository' =>  function (ServiceManager $sm) {
                    $em = $sm->get('EntityManager');
                    return new PeopleRepository($em);
                },
                'LocationForm' => function (ServiceManager $sm) {
                    return new LocationForm();
                },
                'LocationRepository' =>  function (ServiceManager $sm) {
                    $em = $sm->get('EntityManager');
                    return new LocationRepository($em);
                }
            ),
        );
    }

    /**
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     *
     * @return array
     */
    public function getControllerConfig()
    {
        return array(
            'factories' => array(
                'Branches\Controller\People' => function (ControllerManager $cm) {
                    $repository = $cm->getServiceLocator()->get('PeopleRepository');
                    return new PeopleController($repository);
                },
                'Branches\Controller\Places' => function (ControllerManager $cm) {
                    $repository = $cm->getServiceLocator()->get('LocationRepository');
                    $serializer = \JMS\Serializer\SerializerBuilder::create()->build();
                    return new PlacesController($repository, $serializer);
                }
            )
        );
    }
}
