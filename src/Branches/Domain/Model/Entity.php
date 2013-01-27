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
    protected $_id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     *
     * @param int $id
     * @return Entity
     */
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }
}
