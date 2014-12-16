<?php

namespace Branches\Domain\Entity\Person;

use Branches\Domain\Entity\AbstractEntity;
use Branches\Domain\Entity\NotedTrait;
use Branches\Domain\Entity\SourcedTrait;
use Branches\Domain\Entity\TimestampedTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Name
 * @package Branches\Domain\Entity\Person
 */
class Name extends AbstractEntity
{
    use NotedTrait;
    use SourcedTrait;
    use TimestampedTrait;

    /**
     * @var \Branches\Domain\Entity\Person\Person
     */
    private $person;

    /**
     * @var string
     */
    private $prefix;

    /**
     * @var string
     */
    private $given;

    /**
     * @var string
     */
    private $nick;

    /**
     * @var string
     */
    private $surnamePrefix;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $suffix;

    /**
     * Set us up the class!
     *
     * @param string $given
     * @param string $surname
     */
    public function __construct($given = '', $surname = '')
    {
        $this->given = $given;
        $this->surname = $surname;

        $this->sources = new ArrayCollection();
        $this->notes = new ArrayCollection();
    }

    /**
     * @return Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param Person $person
     * @return $this
     */
    public function setPerson($person)
    {
        $person->getNames()->add($this);
        $this->person = $person;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     * @return $this
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
        return $this;
    }

    /**
     * @return string
     */
    public function getGiven()
    {
        return $this->given;
    }

    /**
     * @param string $given
     * @return $this
     */
    public function setGiven($given)
    {
        $this->given = $given;
        return $this;
    }

    /**
     * @return string
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * @param string $nick
     * @return $this
     */
    public function setNick($nick)
    {
        $this->nick = $nick;
        return $this;
    }

    /**
     * @return string
     */
    public function getSurnamePrefix()
    {
        return $this->surnamePrefix;
    }

    /**
     * @param string $surnamePrefix
     * @return $this
     */
    public function setSurnamePrefix($surnamePrefix)
    {
        $this->surnamePrefix = $surnamePrefix;
        return $this;
    }

    /**
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     * @return $this
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
        return $this;
    }

    /**
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }

    /**
     * @param string $suffix
     * @return $this
     */
    public function setSuffix($suffix)
    {
        $this->suffix = $suffix;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $formatted = ($this->prefix ? $this->prefix . ' ' : '') . $this->given . ' ';
        $formatted .= ($this->surnamePrefix ? $this->surnamePrefix . ' ' : '') . $this->surname;
        $formatted .= ($this->suffix ? ' ' . $this->suffix : '');

        return $formatted;
    }
}
