<?php

namespace Branches\Domain\Entity\Place;

use Branches\Domain\Entity\AbstractEntity;

/**
 * Class Place
 * @package Branches\Domain\Entity\Place
 */
class Place extends AbstractEntity
{
    /**
     * @var string
     */
    protected $description;

    protected $address1;

    protected $address2;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->description;
    }
}
