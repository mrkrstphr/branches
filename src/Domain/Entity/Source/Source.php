<?php

namespace Branches\Domain\Entity\Source;

use Branches\Domain\Entity\AbstractEntity;
use Branches\Domain\Entity\NotedTrait;
use Branches\Domain\Entity\TimestampedTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Source
 * @package Branches\Domain\Entity\Source
 */
class Source extends AbstractEntity
{
    use NotedTrait;
    use TimestampedTrait;

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
