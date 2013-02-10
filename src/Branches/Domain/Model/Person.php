<?php
/**
 *
 */

namespace Branches\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Branches\Domain\Model\Relationship;

/**
 *
 */
class Person extends Entity
{
    use Sourced;
    use \Branches\Domain\Model\Timestamped;

    /**
     *
     * @var string
     */
    protected $refId;

    /**
     * @var string
     */
    protected $gender;

    /**
     *
     * @var ArrayCollection
     */
    protected $names;

    /**
     *
     * @var ArrayCollection
     */
    protected $relationships;

    /**
     *
     * @var ArrayCollection
     */
    protected $parents;

    /**
     *
     * @var ArrayCollection
     */
    protected $events;

    /**
     * @var ArrayCollection
     */
    protected $sources;

    /**
     * @var ArrayCollection
     */
    protected $notes;

    /**
     *
     */
    public function __construct()
    {
        $this->names = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->relationships = new ArrayCollection();
        $this->sources = new ArrayCollection();
        $this->notes = new ArrayCollection();
    }

    /**
     *
     * @return string
     */
    public function getRefId()
    {
        return $this->refId;
    }

    /**
     *
     * @param string $refId
     * @return Person
     */
    public function setRefId($refId)
    {
        $this->refId = $refId;

        return $this;
    }

    /**
     *
     * @param string $gender
     * @throws \Exception
     */
    public function setGender($gender)
    {
        $gender = strtoupper($gender);

        if (!in_array($gender, array('M','F'))) {
            throw new \Exception('Unknown gender specified: ' . $gender);
        }

        $this->gender = $gender;
    }

    /**
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     *
     * @param Name $name
     */
    public function addName(Name $name)
    {
        $this->names[] = $name;
    }

    /**
     *
     * @param array $names
     */
    public function setNames(array $names)
    {
        $this->names = $names;
    }

    /**
     *
     * @return array
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     *
     * @return Name
     */
    public function getConfirmedName()
    {
        $confirmed = null;

        foreach ($this->getNames() as $name) {
            if ($confirmed) {
                if ($name->getCertainty() > $confirmed->getCertainty()) {
                    $confirmed = $name;
                }
            } else {
                $confirmed = $name;
            }
        }

        return $confirmed;
    }

    /**
     *
     * @return ArrayCollection
     */
    public function getRelationships()
    {
        return $this->relationships;
    }

    /**
     *
     * @param array $parents
     */
    public function setParents($parents)
    {
        $this->parents = $parents;
    }

    /**
     *
     * @return array
     */
    public function getParents($linkage = '')
    {
        $linkage = strtolower($linkage);
        if (!empty($linkage)) {
            if (isset($this->parents[$linkage])) {
                return $this->parents[$linkage];
            } else {
                return array();
            }
        }

        return $this->parents;
    }

    /**
     *
     * @param Relationship $parents
     * @param string $linkage
     * @param int $confidence
     * @throws \Exception
     */
    public function addParents(Relationship $parents, $linkage)
    {
        $linkage = strtolower($linkage);
        if (!in_array($linkage, Relationship::$famcLinkage)) {
            throw new \Exception('Invalid child pedigree linkage: ' . $linkage);
        }

        $this->parents[$linkage][] = $parents;
    }

    /**
     *
     * @return Relationship
     */
    public function getConfirmedParents()
    {
        $confirmed = null;
        $confirmedType = null;

        foreach ($this->parents as $type => $parents) {
            foreach ($parents as $parent) {
                if ($type == 'adopted') {
                    $confirmed = $parent;
                    $confirmedType = $type;
                } else if ($type == 'birth' && $confirmedType != 'adopted') {
                    $confirmed = $parent;
                    $confirmedType = $type;
                } else if (is_null($type)) {
                    $confirmed = $parent;
                    $confirmedType = $type;
                }
            }
        }

        return $confirmed;
    }

    /**
     *
     * @param array $events
     */
    public function setEvents(array $events)
    {
        $this->events = $events;
    }

    /**
     *
     * @return array
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     *
     * @param Event $event
     */
    public function addEvent(Event $event)
    {
        $this->events[] = $event;
    }
}
