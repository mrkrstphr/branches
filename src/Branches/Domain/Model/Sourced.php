<?php
/**
 *
 */

namespace Branches\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 */
trait Sourced
{
    /**
     *
     * @var array
     */
    protected $sources;

    /**
     *
     * @return ArrayCollection
     */
    public function getSources()
    {
        return $this->sources;
    }
}
