<?php

namespace Branches\Domain\Entity\Family;

use Branches\Domain\Entity\AbstractEntity;

class Child extends AbstractEntity
{
    /**
     * @var \Branches\Domain\Entity\Family\Family
     */
    protected $family;

    /**
     * @var \Branches\Domain\Entity\Person\Person
     */
    protected $child;

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
