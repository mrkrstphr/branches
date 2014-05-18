<?php

namespace Branches\Controller;

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
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     * @throws RuntimeException
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $serviceName = func_get_arg(1);

        if (method_exists($this, 'create' . $serviceName)) {
            return $this->{'create' . $serviceName}($serviceLocator);
        }

        throw new RuntimeException('Unknown controller ' . func_get_arg(2) . ' requested');
    }

    /**
     * @param ControllerManager $manager
     * @return IndexController
     */
    public function createBranchesControllerIndex(ControllerManager $manager)
    {
        return new IndexController();
    }
}
