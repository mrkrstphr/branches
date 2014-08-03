<?php

namespace Branches\Domain\Entity\Source;

use Branches\Domain\Entity\AbstractEntity;

/**
 * Class Source
 * @package Branches\Domain\Entity\Source
 */
class Source extends AbstractEntity
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
