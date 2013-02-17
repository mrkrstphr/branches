<?php
/**
 *
 */

namespace Branches\Domain\Model;

/**
 * Provides unit testing against the Name
 */
class SourceTest extends \PHPUnit_Framework_TestCase
{
    use NotedTest;

    /**
     *
     */
    public function setUp()
    {
        $this->entity = 'Branches\\Domain\\Model\\Source';
    }

    /**
     *
     */
    public function testSource()
    {
        $source = new Source();
        $source->setTitle('History of Kent County, Michigan');
        $source->setAuthor('Chas. C. Chapman');
        $source->setPublication('Chicago, 1881');
        $source->setAgency('Public Domain');
        $source->setRin(4);
        $source->setAbbr('Something');
        $source->setText('This is some text');

        $note = new Note();
        $source->getNotes()->add($note);

        $this->assertEquals('History of Kent County, Michigan', $source->getTitle());
        $this->assertEquals('Chas. C. Chapman', $source->getAuthor());
        $this->assertEquals('Chicago, 1881', $source->getPublication());
        $this->assertEquals('Public Domain', $source->getAgency());
        $this->assertEquals(4, $source->getRin());
        $this->assertEquals('This is some text', $source->getText());
        $this->assertEquals('Something', $source->getAbbr());
        $this->assertCount(1, $source->getNotes());

    }
}
