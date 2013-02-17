<?php
/**
 *
 */

namespace Branches\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 */
class Source extends \Branches\Domain\Model\Entity
{
    use Noted;
    use Timestamped;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $author;

    /**
     * @var string
     */
    protected $publication;

    /**
     * @var string
     */
    protected $agency;

    /**
     * @var string
     */
    protected $abbr;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string
     */
    protected $rin;


    /**
     * @var ArrayCollection
     */
    protected $notes;

    /**
     *
     */
    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }

    /**
     * @param string $abbr
     */
    public function setAbbr($abbr)
    {
        $this->abbr = $abbr;
    }

    /**
     * @return string
     */
    public function getAbbr()
    {
        return $this->abbr;
    }

    /**
     * @param string $agency
     */
    public function setAgency($agency)
    {
        $this->agency = $agency;
    }

    /**
     * @return string
     */
    public function getAgency()
    {
        return $this->agency;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $publication
     */
    public function setPublication($publication)
    {
        $this->publication = $publication;
    }

    /**
     * @return string
     */
    public function getPublication()
    {
        return $this->publication;
    }

    /**
     * @param string $rin
     */
    public function setRin($rin)
    {
        $this->rin = $rin;
    }

    /**
     * @return string
     */
    public function getRin()
    {
        return $this->rin;
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

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
