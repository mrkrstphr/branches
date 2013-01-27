<?php
/**
 *
 */

namespace Branches\Domain\Model\Person;

/**
 *
 */
class Person extends \Branches\Domain\Model\Entity
{
    use \Branches\Domain\Model\Timestamped;

    /**
     * @var string
     */
    protected $_refId;

    /**
     *
     * @var array
     */
    protected $_names = array();

    /**
     * @return string
     */
    public function getRefId()
    {
        return $this->_refId;
    }

    /**
     * @param string $refId
     * @return Person
     */
    public function setRefId($refId)
    {
        $this->_refId = $refId;

        return $this;
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
}
