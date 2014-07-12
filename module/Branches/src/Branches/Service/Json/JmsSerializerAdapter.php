<?php

namespace Branches\Service\Json;

use Branches\Domain\Service\Json\SerializerInterface;
use JMS\Serializer\Serializer;

/**
 * Class JmsSerializerAdapter
 * @package Branches\Service\Json
 */
class JmsSerializerAdapter implements SerializerInterface
{
    /**
     * @var Serializer
     */
    protected $serializer;

    /**
     * @param Serializer $serializer
     */
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param array $data
     * @return string
     */
    public function serialize(array $data)
    {
        return $this->serializer->serialize($data, 'json');
    }
}
