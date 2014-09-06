<?php

namespace Branches\Domain\Entity\Person;

use Branches\Domain\Entity\AbstractEntity;

/**
 * Class EventSource
 * @package Branches\Domain\Entity\Person
 */
class EventSource extends AbstractEntity
{
    /**
     * @var \Branches\Domain\Entity\Person\Event
     */
    protected $event;

    /**
     * @var \Branches\Domain\Entity\Source\Source
     */
    protected $source;

    /**
     * @var string
     */
    protected $page;

    /**
     * @var string
     */
    protected $text;

    /**
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param Event $event
     * @return $this
     */
    public function setEvent($event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * @return \Branches\Domain\Entity\Source\Source
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param \Branches\Domain\Entity\Source\Source $source
     * @return $this
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @return string
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param string $page
     * @return $this
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }
}
