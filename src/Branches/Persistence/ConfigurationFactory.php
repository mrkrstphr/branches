<?php

namespace Branches\Persistence;

use Doctrine\Common\EventManager;

class ConfigurationFactory
{
    /**
     * @var string
     */
    protected $envName;

    /**
     * @var string
     */
    protected $environment;

    /**
     * @var array
     */
    protected $dbParams = array();

    /**
     * @var array
     */
    protected $mappings = array();

    /**
     * @var EventManager
     */
    protected $eventManager;

    /**
     * @param array $config
     */
    public function loadConfiguration(array $config)
    {
        if (isset($config['environment']) && is_string($config['environment'])) {
            $this->environment = $config['environment'];
        }

        if (isset($config['params']) && is_array($config['params'])) {
            $this->dbParams = $config['params'];
        }

        if (isset($config['mappings']) && is_array($config['mappings'])) {
            $this->mappings = $config['mappings'];
        }
    }

    /**
     * @param EventManager $eventManager
     */
    public function setEventManager(EventManager $eventManager)
    {
        $this->eventManager = $eventManager;
    }

    /**
     * @return \Doctrine\Common\EventManager
     */
    public function getEventManager()
    {
        return $this->eventManager;
    }

    /**
     * @return string
     */
    public function getEnvName()
    {
        return $this->envName;
    }

    /**
     * @return array
     */
    public function getDbParams()
    {
        return $this->dbParams;
    }

    /**
     * @return array
     */
    public function getMappingPaths()
    {
        return $this->mappings;
    }
}
