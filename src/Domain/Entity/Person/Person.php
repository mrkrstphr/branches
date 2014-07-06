<?php

namespace Branches\Domain\Entity\Person;

use Branches\Domain\Entity\AbstractEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Person
 * @package Branches\Domain\Entity
 */
class Person extends AbstractEntity
{
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    private $names;

    /**
     * Set us up the class!
     */
    public function __construct()
    {
        $this->names = new ArrayCollection();
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $names
     * @return $this
     */
    public function setNames($names)
    {
        $this->names = $names;
        return $this;
    }

    /**
     * @return Name
     */
    public function getDisplayName()
    {
        // todo fixme
        return $this->names[0];
    }
}
