<?php
/**
 *
 */

namespace Branches\Domain\Model\Person;

/**
 *
 */
class Name extends \Branches\Domain\Model\Entity
{
    use \Branches\Domain\Model\Sourceable;

    /**
     *
     * @var string
     */
    protected $_givenName;

    /**
     *
     * @var string
     */
    protected $_surname;

    /**
     *
     * @param string $givenName
     */
    public function setGivenName($givenName)
    {
        $this->_givenName = $givenName;
    }

    /**
     *
     * @return string
     */
    public function getGivenName()
    {
        return $this->_givenName;
    }

    /**
     *
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->_surname = $surname;
    }

    /**
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->_surname;
    }



}
