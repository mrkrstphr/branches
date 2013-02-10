<?php
/**
 *
 */
namespace Branches\Domain\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 *
 */
class Note extends \Branches\Domain\Model\Entity
{
    use Sourced;
    use Timestamped;

    /**
     * @var string
     */
    protected $note;

    /**
     *
     */
    public function __construct()
    {
        $this->sources = new ArrayCollection();
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }
}
