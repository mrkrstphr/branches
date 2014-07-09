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
    protected $names;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $parents;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $relationships;

    /**
     * @var string
     */
    protected $gender;

    /**
     * @var string
     */
    protected $description;

    /**
     * Set us up the class!
     */
    public function __construct()
    {
        $this->names = new ArrayCollection();
        $this->parents = new ArrayCollection();
        $this->relationships = new ArrayCollection();
    }

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
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return $this
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
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

    /**
     * @return ArrayCollection
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * @param ArrayCollection $parents
     * @return $this
     */
    public function setParents($parents)
    {
        $this->parents = $parents;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasParents()
    {
        return count($this->parents) > 0;
    }

    /**
     * @return Parents
     */
    public function getPreferredParents()
    {
        // todo fixme
        return $this->parents[0];
    }

    public function getPreferredParent($index)
    {
        $parents = $this->getPreferredParents();

        if ($parents) {
            foreach ($parents->getFamily()->getParents() as $parent) {
                if ($index == 0 && $parent->getGender() == 'M') {
                    return $parent;
                } else if ($index == 1 && $parent->getGender() == 'F') {
                    return $parent;
                }
            }

            if (count($parents) > 1) {
                return $parents[$index];
            }

            if (count($parents) == 1 && $index == 1) {
                return $parents[0];
            }
        }

        return null;
    }

    /**
     * @return ArrayCollection
     */
    public function getRelationships()
    {
        return $this->relationships;
    }

    /**
     * @param ArrayCollection $relationships
     * @return $this
     */
    public function setRelationships($relationships)
    {
        $this->relationships = $relationships;
        return $this;
    }
}
