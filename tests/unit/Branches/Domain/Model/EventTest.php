<?php
/**
 *
 */

namespace Branches\Domain\Model;

/**
 *
 */
class EventTest extends \PHPUnit_Framework_TestCase
{
    use NotedTest;
    use SourcedTest;
    use TimestampedTest;

    /**
     *
     */
    public function setUp()
    {
        $this->entity = 'Branches\\Domain\\Model\\Event';
    }

    /**
     *
     */
    public function testEvents()
    {
        $type = 'BIRT';
        $eventDate = '14 Apr 1900';

        $event = new Event();
        $event->setType($type);
        $event->setCertainty(100);
        $event->setDate($eventDate);
        $event->setAge(14);
        $event->setCause('Penguin Attack');

        $this->assertEquals($type, $event->getType());
        $this->assertEquals(100, $event->getCertainty());
        $this->assertEquals($eventDate, $event->getDate());
        $this->assertEquals(14, $event->getAge());
        $this->assertEquals('Penguin Attack', $event->getCause());

        $location = new Location();
        $event->setLocation($location);
        $this->assertEquals($location, $event->getLocation());
    }

    /**
     *
     * @dataProvider dateProvider
     * @param string $date
     * @param string $stamp
     */
    public function testDateStamp($date, $stamp)
    {
        $event = new Event();
        $event->setDate($date);

        $this->assertEquals($date, $event->getDate());
        $this->assertEquals($stamp, $event->getStamp());
    }

    /**
     *
     * @return array
     */
    public function dateProvider()
    {
        return array(
            array('14 Mar 1924', '19240314'),
            array('Abt 1843', '18430000'),
            array('Aft 1782', '17820000'),
            array('Bef 1698', '16980000'),
            array('Dec 1942', '19421200'),
            array('Bet 21 Jul 1804 AND 16 Aug 1804', '18040721')
        );
    }
}
