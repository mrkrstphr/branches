<?php

namespace Branches\Domain\Entity\Family;

use Branches\Domain\Entity\AbstractEntity;
use Branches\Domain\Entity\Person\Person;

/**
 * Class Child
 * @package Branches\Domain\Entity\Family
 */
class Child extends AbstractEntity
{
    /**
     * @var Family
     */
    protected $family;

    /**
     * @var Person
     */
    protected $person;

    /**
     * @var string
     */
    protected $pedigree;

    /**
     * @return Family
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * @param Family $family
     * @return $this
     */
    public function setFamily($family)
    {
        $this->family = $family;
        return $this;
    }

    /**
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Person $person
     * @return $this
     */
    public function setPerson($person)
    {
        $this->person = $person;
        return $this;
    }

    /**
     * @return string
     */
    public function getPedigree()
    {
        return $this->pedigree;
    }

    /**
     * @param string $pedigree
     * @return $this
     */
    public function setPedigree($pedigree)
    {
        $this->pedigree = $pedigree;
        return $this;
    }
}
