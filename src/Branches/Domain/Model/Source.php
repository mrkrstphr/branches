<?php
/**
 *
 */

namespace Branches\Domain\Model;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 */
class Source extends \Branches\Domain\Model\Entity
{
    use Noted;

    /**
     * @var string
     */
    protected $page;

    /**
     * @var DateTime
     */
    protected $dateOfEntry;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var integer
     */
    protected $certainty;

    /**
     *
     */
    public function __construct()
    {
        $this->dateOfEntry = new DateTime();
        $this->notes = new ArrayCollection();
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
     * @param DateTime $dateOfEntry
     */
    public function setDateOfEntry(DateTime $dateOfEntry)
    {
        $this->dateOfEntry = $dateOfEntry;
    }

    /**
     * @return DateTime
     */
    public function getDateOfEntry()
    {
        return $this->dateOfEntry;
    }

    /**
     * @param string $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }
}
