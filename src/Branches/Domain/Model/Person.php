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
    use Noted;
    use Sourced;
    use Timestamped;

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
    protected $attributes;

    /**
     *
     * @var ArrayCollection
     */
    protected $events;

    /**
     *
     */
    public function __construct()
    {
        $this->names = new ArrayCollection();
        $this->attributes = new ArrayCollection();
        $this->events = new ArrayCollection();
        $this->parents = new ArrayCollection();
        $this->relationships = new ArrayCollection();
        $this->sources = new ArrayCollection();
        $this->notes = new ArrayCollection();

        $this->created = new \DateTime();
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
     * @return ArrayCollection
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
     * @return ArrayCollection
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     *
     * @return Relationship
     */
    public function getConfirmedParents()
    {
        $confirmed = null;
        $confirmedPedigree = null;

        foreach ($this->parents as $parent) {
            $pedigree = $parent->getPedigree();

            if ($pedigree == 'adopted') {
                $confirmed = $parent;
                $confirmedPedigree = $pedigree;
            } elseif ($pedigree == 'birth' && $confirmedPedigree != 'adopted') {
                $confirmed = $parent;
                $confirmedPedigree = $pedigree;
            } elseif (is_null($confirmedPedigree)) {
                $confirmed = $parent;
                $confirmedPedigree = $pedigree;
            }
        }

        return $confirmed;
    }

    /**
     * @return ArrayCollection
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @return ArrayCollection
     */
    public function getEvents()
    {
        return $this->events;
    }
}
