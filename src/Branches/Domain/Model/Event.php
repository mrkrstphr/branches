<?php
/**
 *
 */

namespace Branches\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 */
class Event extends Entity
{
    use Sourced;
    use \Branches\Domain\Model\Timestamped;

    /**
     *
     * @var string
     */
    protected $eventType;

    /**
     *
     * @var string
     */
    protected $eventDate;

    /**
     *
     * @var string
     */
    protected $eventStamp;

    /**
     *
     * @var Location
     */
    protected $location;

    /**
     *
     * @var int
     */
    protected $confidenceLevel;

    public function __construct()
    {
        $this->sources = new ArrayCollection();
    }

    /**
     * @param int $confidenceLevel
     */
    public function setConfidenceLevel($confidenceLevel)
    {
        $this->confidenceLevel = $confidenceLevel;
    }

    /**
     * @return int
     */
    public function getConfidenceLevel()
    {
        return $this->confidenceLevel;
    }

    /**
     * @param string $eventDate
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;

        $eventDate = strtolower($eventDate);
        $eventDate = trim(
            str_replace(
                array('bef', 'aft', 'bet', 'abt', 'from'),
                '',
                $eventDate
            )
        );

        if (preg_match('/^(.*) and (.*)$/', $eventDate)) {
            $eventDate = explode(' and ', $eventDate);
            $eventDate = $eventDate[0];
        }

        $month = 'jan|feb|mar|apr|may|jun|jul|aug|sep|oct|nov|dec';
        $matches = array();
        if (preg_match('/^([0-9]{1,2}) (' . $month . ') ([0-9]{4})$/', $eventDate, $matches)) {
            $index = array_search($matches[2], explode('|', $month));

            if ($index) {
                $stamp = $matches[3] . str_pad(($index + 1), 2, '0', STR_PAD_LEFT) .
                    str_pad($matches[1], 2, '0', STR_PAD_LEFT);
                $this->_setEventStamp($stamp);
            }
        } else if (preg_match('/^(' . $month . ') ([0-9]{4})$/', $eventDate, $matches)) {
            $index = array_search($matches[1], explode('|', $month));

            if ($index) {
                $stamp = $matches[2] . str_pad(($index + 1), 2, '0', STR_PAD_LEFT) . '00';
                $this->_setEventStamp($stamp);
            }
        } else if (preg_match('/^[0-9]{4}$/', $eventDate)) {
            $this->_setEventStamp($eventDate . '0000');
        }
    }

    /**
     * @return string
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * @param string $eventStamp
     */
    protected function _setEventStamp($eventStamp)
    {
        $this->eventStamp = $eventStamp;
    }

    /**
     * @return string
     */
    public function getEventStamp()
    {
        return $this->eventStamp;
    }

    /**
     * @param string $eventType
     */
    public function setEventType($eventType)
    {
        $this->eventType = $eventType;
    }

    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

}
