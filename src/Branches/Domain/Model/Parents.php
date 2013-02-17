<?php
    /**
     *
     */

namespace Branches\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 */
class Parents
{
    use Noted;
    use Sourced;
    use Timestamped;

    /**
     * @var Person
     */
    protected $person;

    /**
     * @var Relationship
     */
    protected $relationship;

    /**
     * @var string
     */
    protected $pedigree;

    /**
     * @param string $pedigree
     */
    public function setPedigree($pedigree)
    {
        $this->pedigree = $pedigree;
    }

    /**
     * @return string
     */
    public function getPedigree()
    {
        return $this->pedigree;
    }

    /**
     * @param \Branches\Domain\Model\Person $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
    }

    /**
     * @return \Branches\Domain\Model\Person
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param \Branches\Domain\Model\Relationship $relationship
     */
    public function setRelationship($relationship)
    {
        $relationship->getChildren()->add($this);
        $this->relationship = $relationship;
    }

    /**
     * @return \Branches\Domain\Model\Relationship
     */
    public function getRelationship()
    {
        return $this->relationship;
    }
}
