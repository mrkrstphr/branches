<?php

namespace Branches;

/**
 * Class Module
 * @package Branches
 */
class Module
{
    /**
     * Get the autoloader configuration.
     *
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
     * Get the controller configuration.
     * @return array
     */
    public function getControllerConfig()
    {
        return include __DIR__ . '/../../config/controller.config.php';
    }

    /**
     * Get the controller plugin configuration.
     * @return array
     */
    public function getControllerPluginConfig()
    {
        return include __DIR__ . '/../../config/controller.plugin.config.php';
    }

    /**
     * Get the service configuration.
     *
     * @return array
     */
    public function getServiceConfig()
    {
        return include __DIR__ . '/../../config/service.config.php';
    }

    /**
     * Get the view helper configuration.
     *
     * @return array
     */
    public function getViewHelperConfig()
    {
        return include __DIR__ . '/../../config/view.helper.config.php';
    }
}
