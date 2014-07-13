<?php

namespace Branches\Domain\Entity\Person;

use Branches\Domain\Entity\AbstractEntity;

/**
 * Class Attribute
 * @package Branches\Domain\Entity\Person
 */
class Attribute extends AbstractEntity
{
    /**
     * @var \Branches\Domain\Entity\Person\Person
     */
    protected $person;

    /**
     * @var \Branches\Domain\Entity\Person\AttributeType
     */
    protected $type;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $date;

    /**
     * @var int
     */
    protected $dateStamp;

    /**
     * @var \Branches\Domain\Entity\Place\Place
     */
    protected $place;

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
        $this->person = $person;
        return $this;
    }

    /**
     * @return \Branches\Domain\Entity\Person\AttributeType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param \Branches\Domain\Entity\Person\AttributeType $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getDateStamp()
    {
        return $this->dateStamp;
    }

    /**
     * @param int $dateStamp
     * @return $this
     */
    public function setDateStamp($dateStamp)
    {
        $this->dateStamp = $dateStamp;
        return $this;
    }

    /**
     * @return \Branches\Domain\Entity\Place\Place
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param \Branches\Domain\Entity\Place\Place $place
     * @return $this
     */
    public function setPlace($place)
    {
        $this->place = $place;
        return $this;
    }
}
