<?php
/**
 *
 */

namespace Branches\Domain\Model;

/**
 *
 */
abstract class Entity
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @param int $id
     * @return Entity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
}
