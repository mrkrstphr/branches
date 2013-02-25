<?php

namespace Branches\Persistence;

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @var ConfigurationFactory
     */
    protected $configurationFactory;

    /**
     * @var array
     */
    protected static $singletons = array();

    /**
     *
     * @param ConfigurationFactory $config
     */
    public function __construct(ConfigurationFactory $config)
    {
        $this->configurationFactory = $config;
    }

    /**
     *
     * @todo Handle Proxies
     * @todo Handle EventManagers
     * @return EntityManager
     */
    public function getNewEntityManager()
    {
        $dbParams = $this->configurationFactory->getDbParams();

        return EntityManager::create(
            $dbParams,
            Setup::createXMLMetadataConfiguration($this->configurationFactory->getMappingPaths(), true),
            $this->configurationFactory->getEventManager()
        );
    }

    /**
     * @return EntityManager
     */
    public function getSingleton()
    {
        $key = $this->configurationFactory->getEnvName();

        if (isset(self::$singletons[$key])) {
            return self::$singletons[$key];
        }

        $entityManager =  $this->getNewEntityManager();
        self::$singletons[$key] = $entityManager;

        return $entityManager;
    }
}
