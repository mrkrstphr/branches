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
    use Noted;
    use Sourced;
    use Timestamped;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $date;

    /**
     * @var string
     */
    protected $stamp;

    /**
     * @var Location
     */
    protected $location;

    /**
     * @var integer
     */
    protected $age;

    /**
     * @var string
     */
    protected $cause;

    /**
     * @var int
     */
    protected $certainty;

    /**
     *
     */
    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->sources = new ArrayCollection();
    }

    /**
     * @param int $certainty
     */
    public function setCertainty($certainty)
    {
        $this->certainty = $certainty;
    }

    /**
     * @return int
     */
    public function getCertainty()
    {
        return $this->certainty;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;

        $date = strtolower($date);
        $date = trim(
            str_replace(
                array('bef', 'aft', 'bet', 'abt', 'from'),
                '',
                $date
            )
        );

        if (preg_match('/^(.*) and (.*)$/', $date)) {
            $date = explode(' and ', $date);
            $date = $date[0];
        }

        $month = 'jan|feb|mar|apr|may|jun|jul|aug|sep|oct|nov|dec';
        $matches = array();
        if (preg_match('/^([0-9]{1,2}) (' . $month . ') ([0-9]{4})$/', $date, $matches)) {
            $index = array_search($matches[2], explode('|', $month));

            if ($index) {
                $stamp = $matches[3] . str_pad(($index + 1), 2, '0', STR_PAD_LEFT) .
                    str_pad($matches[1], 2, '0', STR_PAD_LEFT);
                $this->setStamp($stamp);
            }
        } elseif (preg_match('/^(' . $month . ') ([0-9]{4})$/', $date, $matches)) {
            $index = array_search($matches[1], explode('|', $month));

            if ($index) {
                $stamp = $matches[2] . str_pad(($index + 1), 2, '0', STR_PAD_LEFT) . '00';
                $this->setStamp($stamp);
            }
        } elseif (preg_match('/^[0-9]{4}$/', $date)) {
            $this->setStamp($date . '0000');
        }
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $stamp
     */
    protected function setStamp($stamp)
    {
        $this->stamp = $stamp;
    }

    /**
     * @return string
     */
    public function getStamp()
    {
        return $this->stamp;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param string $cause
     */
    public function setCause($cause)
    {
        $this->cause = $cause;
    }

    /**
     * @return string
     */
    public function getCause()
    {
        return $this->cause;
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
