<?php
/**
 *
 */

namespace Branches\Domain\Model;

use Branches\Domain\Model\Person\Person;

/**
 *
 */
class Relationship extends Entity
{
    use \Branches\Domain\Model\Timestamped;

    /**
     * @var string
     */
    const ADOPTED = 'adopted';

    /**
     * @var string
     */
    const BIRTH = 'birth';

    /**
     * @var string
     */
    const FOSTER = 'foster';

    /**
     * @var string
     */
    const SEALING = 'sealing';

    /**
     * @var string
     */
    protected $_refId;

    /**
     * @var array
     */
    protected $_parents = array();

    /**
     * @var array
     */
    protected $_children = array();

    /**
     * @var array
     */
    public static $famcLinkage = array(
        self::ADOPTED, self::BIRTH, self::FOSTER, self::SEALING
    );

    /**
     *
     * @param Person $person
     */
    public function addParent(Person $person)
    {
        $person->addRelationship($this);
        $this->_parents[] = $person;
    }

    /**
     *
     * @return array
     */
    public function getParents()
    {
        return $this->_parents;
    }

    /**
     *
     * @param Person $person
     * @return Person
     */
    public function getSpouseOf(Person $person)
    {
        foreach ($this->_parents as $spouse) {
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
     * @return Person
     */
    public function getMother()
    {
        if (count($this->_parents) == 2) {
            if ($this->_parents[0]->getGender() == $this->_parents[1]->getGender()) {
                return $this->_parents[1];
            }
        }

        foreach ($this->_parents as $parent) {
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
     * @return Person
     */
    public function getFather()
    {
        if (count($this->_parents) == 2) {
            if ($this->_parents[0]->getGender() == $this->_parents[1]->getGender()) {
                return $this->_parents[0];
            }
        }

        foreach ($this->_parents as $parent) {
            if ($parent->getGender() == 'M') {
                return $parent;
            }
        }

        return false;
    }

    /**
     * @param array $children
     */
    public function setChildren($children)
    {
        $this->_children = $children;
    }

    /**
     * @return array
     */
    public function getChildren()
    {
        return $this->_children;
    }

    /**
     *
     * @throws \Exception
     * @param Person $child
     */
    public function addChild(Person $child, $linkage)
    {
        if (!in_array(strtolower($linkage), self::$famcLinkage)) {
            throw new \Exception('Invalid child pedigree linkage: ' . $linkage);
        }

        $child->addParents($this, $linkage);
        $this->_children[] = $child;
    }
}
