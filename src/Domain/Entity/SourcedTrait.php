<?php

namespace Branches\Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Trait SourcedTrait
 * @package Branches\Domain\Entity
 */
trait SourcedTrait
{
    /**
     * @var ArrayCollection
     */
    protected $sources;

    /**
     * @return ArrayCollection
     */
    public function getSources()
    {
        return $this->sources;
    }

    /**
     * @param ArrayCollection $sources
     */
    public function setSources($sources)
    {
        $this->sources = $sources;
    }
}
