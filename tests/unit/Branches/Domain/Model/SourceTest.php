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
        $dateOfEntry = new \DateTime('1985-12-06 11:33:06');

        $source = new Source();
        $source->setCertainty(4);
        $source->setDateOfEntry($dateOfEntry);
        $source->setPage('Book 3 Page 14');
        $source->setText('TEST test Test teST');

        $this->assertEquals(4, $source->getCertainty());
        $this->assertEquals($dateOfEntry, $source->getDateOfEntry());
        $this->assertEquals('Book 3 Page 14', $source->getPage());
        $this->assertEquals('TEST test Test teST', $source->getText());
    }
}
