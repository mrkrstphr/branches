<?php

namespace Branches\Domain\Entity\Person;

use Branches\Domain\Entity\AbstractEntity;
use Branches\Domain\Entity\TimestampedTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Person
 * @package Branches\Domain\Entity
 */
class Person extends AbstractEntity
{
    use TimestampedTrait;

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
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $events;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $attributes;

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
        $this->events = new ArrayCollection();
        $this->attributes = new ArrayCollection();
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
     * @param Name $name
     * @return $this
     */
    public function addName(Name $name)
    {
        $name->setPerson($this);
        $this->names->add($name);
        return $this;
    }

    /**
     * @return Name
     */
    public function getPreferredName()
    {
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

            if (count($parents->getFamily()->getParents()) > 1) {
                return $parents->getFamily()->getParents()[$index];
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

    /**
     * @return ArrayCollection
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param ArrayCollection $events
     * @return $this
     */
    public function setEvents($events)
    {
        $this->events = $events;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param ArrayCollection $attributes
     * @return $this
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }
}
