<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Application\Controller\PeopleController;
use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\ServiceManager;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Branches\Persistence\EntityManagerFactory;
use Branches\Persistence\Repositories\PeopleRepository;

/**
 *
 */
class Module
{
    /**
     *
     * @param \Zend\Mvc\MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }

    /**
     *
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     *
     * @return array
     */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Doctrine\ORM\EntityManager' => function(ServiceManager $sm) {
                    return EntityManagerFactory::getSingleton();
                },

                'Branches\Domain\Repository\PeopleRepository' =>  function(ServiceManager $sm) {
                    $em = $sm->get('Doctrine\ORM\EntityManager');
                    return new PeopleRepository($em);
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
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
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
                'Application\Controller\People' => function(ControllerManager $cm) {
                    $people = $cm->getServiceLocator()->get('Branches\Domain\Repository\PeopleRepository');
                    return new PeopleController($people);
                }
            )
        );
    }
}
