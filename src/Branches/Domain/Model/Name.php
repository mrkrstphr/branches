<?php
/**
 *
 */

namespace Branches\Domain\Model;

/**
 *
 */
class Name extends Entity
{
    #use \Branches\Domain\Model\Sourceable;

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
     * @var int
     */
    protected $_confidence;

    /**
     *
     * @param string $givenName
     * @param string $surname
     * @param int $confidence
     */
    public function __construct($givenName = '', $surname = '', $confidence = 0)
    {
        $this->_givenName = $givenName;
        $this->_surname = $surname;

        if ($confidence) {
            $this->_confidence = $confidence;
        }
    }

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

    /**
     *
     * @param int $confidence
     */
    public function setConfidence($confidence)
    {
        $this->_confidence = $confidence;
    }

    /**
     *
     * @return int
     */
    public function getConfidence()
    {
        return $this->_confidence;
    }
}
