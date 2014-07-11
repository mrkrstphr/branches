<?php

namespace Branches;

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
}