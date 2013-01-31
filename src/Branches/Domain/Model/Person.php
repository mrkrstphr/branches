<?php
/**
 *
 */

namespace Branches\Domain\Model;

use Branches\Domain\Model\Relationship;

/**
 *
 */
class Person extends Entity
{
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
     * @var array
     */
    protected $_names = array();

    /**
     *
     * @var array
     */
    protected $_relationships = array();

    /**
     *
     * @var array
     */
    protected $_parents = array();

    /**
     *
     * @var array
     */
    protected $events = array();

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
        $this->_names[] = $name;
    }

    /**
     *
     * @param array $names
     */
    public function setNames(array $names)
    {
        $this->_names = $names;
    }

    /**
     *
     * @return array
     */
    public function getNames()
    {
        return $this->_names;
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
                if ($name->getConfidence() > $confirmed->getConfidence()) {
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
     * @param array $relationships
     */
    public function setRelationships($relationships)
    {
        $this->_relationships = $relationships;
    }

    /**
     *
     * @return array
     */
    public function getRelationships()
    {
        return $this->_relationships;
    }

    /**
     *
     * @param Relationship $relationship
     */
    public function addRelationship(Relationship $relationship)
    {
        $this->_relationships[] = $relationship;
    }

    /**
     *
     * @param array $parents
     */
    public function setParents($parents)
    {
        $this->_parents = $parents;
    }

    /**
     *
     * @return array
     */
    public function getParents($linkage = '')
    {
        $linkage = strtolower($linkage);
        if (!empty($linkage)) {
            if (isset($this->_parents[$linkage])) {
                return $this->_parents[$linkage];
            } else {
                return array();
            }
        }

        return $this->_parents;
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

        $this->_parents[$linkage][] = $parents;
    }

    /**
     *
     * @return Relationship
     */
    public function getConfirmedParents()
    {
        $confirmed = null;
        $confirmedType = null;

        foreach ($this->_parents as $type => $parents) {
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
