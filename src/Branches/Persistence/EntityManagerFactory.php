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
    private static $_singleton;

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
        $json = __DIR__ . DIRECTORY_SEPARATOR . 'doctrine.cfg.json';
        $configs = json_decode(file_get_contents($json));

        $paramsKey = (getenv('ENV') == 'development') ? 'development' : 'production';

        if (!property_exists($configs->params, $paramsKey)) {
            return array();
        }

        return get_object_vars($configs->params->{$paramsKey});
    }

    /**
     *
     * @return \Doctrine\ORM\EntityManager
     */
    public static function getSingleton()
    {
        if(is_null(self::$_singleton))
            self::$_singleton = self::getNewManager();

        return self::$_singleton;
    }
}
