<?php

namespace Branches\Service;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use RuntimeException;
use Branches\Service\Json\JmsSerializerAdapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ServiceFactory
 * @package Branches\Service
 */
class ServiceFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $alias = func_get_arg(1);

        if (!method_exists($this, 'create' . $alias)) {
            throw new RuntimeException('Unable to create service ' . func_get_arg(2));
        }

        return $this->{'create' . $alias}($serviceLocator);
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return JmsSerializerAdapter
     */
    public function createBranchesServiceJsonSerializer(ServiceLocatorInterface $serviceLocator)
    {
        $metaDataDir = realpath($serviceLocator->get('Config')['serialization-configs']);

        $serializer = SerializerBuilder::create()
            ->addMetadataDir($metaDataDir)
            ->build();

        return new JmsSerializerAdapter($serializer);
    }
}
