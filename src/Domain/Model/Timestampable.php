<?php
/**
 *
 */

namespace Branches\Domain\Model;

use \DateTime;

/**
 *
 */
trait Timestampable
{
    /**
     * @var DateTime
     */
    protected $_created;

    /**
     * @var DateTime
     */
    protected $_modified;

    /**
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * @param DateTime $created
     * @return Timestampable
     */
    public function setCreated(DateTime $created)
    {
        $this->_created = $created;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getModified()
    {
        return $this->_modified;
    }

    /**
     * @param DateTime $modified
     * @return Timestampable
     */
    public function setModified(DateTime $modified)
    {
        $this->_modified = $modified;
        return $this;
    }
}
