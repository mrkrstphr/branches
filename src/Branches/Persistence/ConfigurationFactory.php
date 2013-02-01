<?php
/**
 *
 */

namespace Branches\Persistence;

use Doctrine\ORM\Tools\Setup;

/**
 *
 */
class ConfigurationFactory
{
    /**
     *
     */
    public function __construct()
    {
        $this->paths = array(__DIR__ . DIRECTORY_SEPARATOR . 'mappings');
    }

    /**
     *
     * @return \Doctrine\ORM\Configuration
     */
    public function build()
    {
        #if (getenv('ENV') == 'development') {
            return $this->buildDevConfig();
        #}

        #return $this->buildProdConfig();
    }

    /**
     *
     * @return \Doctrine\ORM\Configuration
     */
    public function buildDevConfig()
    {
        return Setup::createXMLMetadataConfiguration($this->paths, true);
    }

    /**
     *
     * @return \Doctrine\ORM\Configuration
     */
    public function buildProdConfig()
    {
        $proxies = __DIR__ . DIRECTORY_SEPARATOR . 'proxies';
        $config = Setup::createXMLMetadataConfiguration($this->paths, false, $proxies);
        $config->setProxyNamespace('Branches\\Infrastructure\\Persistence\\Proxies');

        return $config;
    }
}