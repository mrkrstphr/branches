<?php
/**
 *
 */

namespace Branches\Domain\Model;

use \DateTime;

/**
 *
 */
trait Timestamped
{
    /**
     * @var DateTime
     */
    protected $_created;

    /**
     * @var DateTime
     */
    protected $_updated;

    /**
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * @param DateTime $created
     * @return Timestamped
     */
    public function setCreated(DateTime $created)
    {
        $this->_created = $created;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdated()
    {
        return $this->_updated;
    }

    /**
     * @param DateTime $updated
     * @return Timestamped
     */
    public function setUpdated(DateTime $updated)
    {
        $this->_updated = $updated;
        return $this;
    }
}
