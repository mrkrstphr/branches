<?php

namespace Branches\Domain\Entity\Person;

use Branches\Domain\Entity\AbstractEntity;

/**
 * Class AttributeType
 * @package Branches\Domain\Entity\Person
 */
class AttributeType extends AbstractEntity
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
