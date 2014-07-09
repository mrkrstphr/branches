<?php

namespace Branches\Domain\Entity\Family;

use Branches\Domain\Entity\AbstractEntity;
use Branches\Domain\Entity\Person\Person;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Family
 * @package Branches\Domain\Entity\Family\Family
 */
class Family extends AbstractEntity
{
    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $parents;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $children;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $events;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $notes;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $sources;

    /**
     * Set us up the class!
     */
    public function __construct()
    {
        $this->parents = new ArrayCollection();
        $this->children = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->notes = new ArrayCollection();
        $this->sources = new ArrayCollection();
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getParents()
    {
        return $this->parents;
    }

    public function getParent($index)
    {
        if ($this->parents) {
            foreach ($this->parents as $parent) {
                if ($index == 0 && $parent->getGender() == 'M') {
                    return $parent;
                } else if ($index == 1 && $parent->getGender() == 'F') {
                    return $parent;
                }
            }

            if (count($this->parents) > 1) {
                return $this->parents[$index];
            }

            if (count($this->parents) == 1 && $index == 1) {
                return $this->parents[0];
            }
        }

        return null;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $parents
     * @return $this
     */
    public function setParents($parents)
    {
        $this->parents = $parents;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $children
     * @return $this
     */
    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $events
     * @return $this
     */
    public function setEvents($events)
    {
        $this->events = $events;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $notes
     * @return $this
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getSources()
    {
        return $this->sources;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $sources
     * @return $this
     */
    public function setSources($sources)
    {
        $this->sources = $sources;
        return $this;
    }

    public function getPartner(Person $person)
    {
        foreach ($this->getParents() as $parent) {
            if ($parent != $person) {
                return $parent;
            }
        }

        return null;
    }
}
