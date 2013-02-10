<?php
/**
 *
 */

namespace Branches\Domain\Model;

/**
 * Provides unit testing against the Note entity.
 */
class NoteTest extends \PHPUnit_Framework_TestCase
{
    use SourcedTest;
    use TimestampedTest;

    /**
     *
     */
    public function setUp()
    {
        $this->entity = 'Branches\\Domain\\Model\\Note';
    }

    /**
     *
     */
    public function testNote()
    {
        $text = 'This is a note I wrote about something and someone, not to mention some thing';

        $note = new Note();
        $note->setNote($text);

        $this->assertEquals($text, $note->getNote());
    }
}
