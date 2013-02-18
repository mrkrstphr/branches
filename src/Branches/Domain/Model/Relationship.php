<?php
/**
 *
 */

namespace Branches\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 */
class Relationship extends Entity
{
    use Noted;
    use Sourced;
    use Timestamped;

    /**
     * @var string
     */
    protected $refId;

    /**
     * @var ArrayCollection
     */
    protected $events;

    /**
     * @var ArrayCollection
     */
    protected $parents;

    /**
     * @var ArrayCollection
     */
    protected $children;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->children = new ArrayCollection();
        $this->parents = new ArrayCollection();
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     *
     * @return ArrayCollection
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     *
     * @param Person $person
     * @return boolean|Person
     */
    public function getSpouseOf(Person $person)
    {
        foreach ($this->parents as $spouse) {
            if ($person !== $spouse) {
                return $spouse;
            }
        }

        return false;
    }

    /**
     * If same sex couple, we randomly pick index 0 as the father and index 1 as the mother. This should
     * be handled in the UI to not mislabel a partner in a same sex relationship as the wrong gender.
     *
     * @return boolean|Person
     */
    public function getMother()
    {
        if (count($this->parents) == 2) {
            if ($this->parents[0]->getGender() == $this->parents[1]->getGender()) {
                return $this->parents[1];
            }
        }

        foreach ($this->parents as $parent) {
            if ($parent->getGender() == 'F') {
                return $parent;
            }
        }

        return false;
    }

    /**
     * If same sex couple, we randomly pick index 0 as the father and index 1 as the mother. This should
     * be handled in the UI to not mislabel a partner in a same sex relationship as the wrong gender.
     *
     * @return boolean|Person
     */
    public function getFather()
    {
        if (count($this->parents) == 2) {
            if ($this->parents[0]->getGender() == $this->parents[1]->getGender()) {
                return $this->parents[0];
            }
        }

        foreach ($this->parents as $parent) {
            if ($parent->getGender() == 'M') {
                return $parent;
            }
        }

        return false;
    }

    /**
     * @return ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }
}
