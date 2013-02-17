<?php
/**
 *
 */

namespace Branches\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 */
class Name extends Entity
{
    use Sourced;
    use Timestamped;

    /**
     * @var string
     */
    protected $givenName;

    /**
     * @var string
     */
    protected $surname;

    /**
     * @var int
     */
    protected $certainty;

    /**
     * @var string
     */
    protected $prefix;

    /**
     * @var string
     */
    protected $suffix;

    /**
     * @var string
     */
    protected $nickname;

    /**
     * @param string $givenName
     * @param string $surname
     * @param int $certainty
     */
    public function __construct($givenName = '', $surname = '', $certainty = 0)
    {
        $this->givenName = $givenName;
        $this->surname = $surname;

        if ($certainty) {
            $this->certainty = $certainty;
        }

        $this->sources = new ArrayCollection();
    }

    /**
     * @param string $givenName
     */
    public function setGivenName($givenName)
    {
        $this->givenName = $givenName;
    }

    /**
     * @return string
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $suffix
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
    }

    /**
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @return string
     */
    public function getProperName()
    {
        $properName = !empty($this->prefix) ? $this->prefix . ' ' : '';
        $properName .= $this->givenName . ' ' . $this->surname;
        $properName .= !empty($this->suffix) ? ', ' . $this->suffix : '';

        return $properName;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        $fullName = $this->givenName . ' ' . $this->surname;
        $fullName .= !empty($this->suffix) ? ', ' . $this->suffix : '';

        return $fullName;
    }

    /**
     * @return string
     */
    public function getSurnameFirst()
    {
        $fullName = $this->surname . ', ' . $this->givenName;
        $fullName .= !empty($this->suffix) ? ', ' . $this->suffix : '';

        return $fullName;
    }

    /**
     *
     * @param int $confidence
     */
    public function setCertainty($confidence)
    {
        $this->certainty = $confidence;
    }

    /**
     * @return int
     */
    public function getCertainty()
    {
        return $this->certainty;
    }
}
