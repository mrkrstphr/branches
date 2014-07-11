<?php

namespace Branches\Domain\Entity\Event;

use Branches\Domain\Entity\AbstractEntity;

/**
 * Class PersonEventType
 * @package Branches\Domain\Entity\Event
 */
class PersonEventType extends AbstractEntity
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
