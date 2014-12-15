<?php

namespace Branches\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class NotedTrait
 * @package Branches\Domain\Entity
 */
trait NotedTrait
{
    /**
     * @var ArrayCollection
     */
    protected $notes;

    /**
     * @return ArrayCollection
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param ArrayCollection $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }
}
