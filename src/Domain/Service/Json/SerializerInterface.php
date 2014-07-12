<?php

namespace Branches\Domain\Service\Json;

/**
 * Interface SerializerInterface
 * @package Branches\Domain\Service\Json
 */
interface SerializerInterface
{
    /**
     * @param array $data
     * @return string
     */
    public function serialize(array $data);
}
