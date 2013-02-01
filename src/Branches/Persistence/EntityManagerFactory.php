<?php
/**
 *
 */

namespace Branches\Persistence;

use Branches\Persistence\ConfigurationFactory,
    Doctrine\ORM\EntityManager;

/**
 *
 */
class EntityManagerFactory
{
    /**
     *
     * @var \Doctrine\ORM\EntityManager
     */
    private static $singleton;

    /**
     *
     * @return \Doctrine\ORM\EntityManager
     */
    public static function getNewManager()
    {
        $configFactory = new ConfigurationFactory();
        $dbParams = self::getDbParams();

        return EntityManager::create($dbParams, $configFactory->build());
    }

    /**
     *
     * @return array
     */
    public static function getDbParams()
    {
        $params = include __DIR__ . '/../config/db.local.php';
        return $params;
    }

    /**
     *
     * @return \Doctrine\ORM\EntityManager
     */
    public static function getSingleton()
    {
        if (is_null(self::$singleton)) {
            self::$singleton = self::getNewManager();
        }

        return self::$singleton;
    }
}
