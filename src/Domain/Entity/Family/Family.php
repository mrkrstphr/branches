<?php

namespace Branches\Domain\Entity\Family;

use Branches\Domain\Entity\AbstractEntity;
use Branches\Domain\Entity\NotedTrait;
use Branches\Domain\Entity\Person\Person;
use Branches\Domain\Entity\SourcedTrait;
use Branches\Domain\Entity\TimestampedTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Family
 * @package Branches\Domain\Entity\Family\Family
 */
class Family extends AbstractEntity
{
    use NotedTrait;
    use SourcedTrait;
    use TimestampedTrait;

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
     * Set us up the class!
     */
    public function __construct()
    {
        $this->parents = new ArrayCollection();
        $this->children = new ArrayCollection();
        $this->events = new ArrayCollection();
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * Return the parent in this family who is not the passed $person.
     *
     * @param Person $person
     * @return Person|null
     */
    public function getPartner(Person $person)
    {
        foreach ($this->getParents() as $parent) {
            if ($parent != $person) {
                return $parent;
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
     * @param Person $parent
     * @return $this
     */
    public function addParent(Person $parent)
    {
        // todo parent->add or ->set?
        $this->parents->add($parent);
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
     * @param Child $child
     * @return $this
     */
    public function addChild(Child $child)
    {
        $child->setFamily($this);
        $this->children->add($child);
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
     */
    public function setEvents($events)
    {
        $this->events = $events;
    }
}
