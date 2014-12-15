<?php

namespace Branches;

use Branches\Service\Authentication\AuthenticationHandler;
use Zend\Http\Request;
use Zend\Mvc\MvcEvent;

/**
 * Class Module
 * @package Branches
 */
class Module
{
    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return include __DIR__ . '/../../config/autoloader.config.php';
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    /**
     * @return array
     */
    public function getControllerConfig()
    {
        return include __DIR__ . '/../../config/controller.config.php';
    }

    /**
     * @return array
     */
    public function getServiceConfig()
    {
        return include __DIR__ . '/../../config/service.config.php';
    }

    /**
     * @return array
     */
    public function getViewHelperCOnfig()
    {
        return include __DIR__ . '/../../config/view.helper.config.php';
    }

    /**
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
//        $em = $e->getApplication()->getEventManager();
//        $em->attach(MvcEvent::EVENT_ROUTE, function (MvcEvent $event) {
//            return (new AuthenticationHandler())->onRequestEvent($event);
//        });
//        [$this, 'onRoute']
//});
        //$em->attach(MvcEvent::EVENT_DISPATCH_ERROR, [$this, 'onDispatchError'], -999);
    }
}
