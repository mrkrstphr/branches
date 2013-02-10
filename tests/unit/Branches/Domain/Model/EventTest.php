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
    use TimestampedTest, SourcedTest;

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
        $description = 'test description';
        $address1 = 'Attn Wicked Dude';
        $address2 = '123 Any Street';
        $address3 = 'Apt #14';
        $city = 'Chicago';
        $state = 'IL';
        $postal = '60602';
        $country = 'US';

        $event = new Event();
        $event->setEventType($type);
        $event->setConfidenceLevel(100);
        $event->setEventDate($eventDate);

        $this->assertEquals($type, $event->getEventType());
        $this->assertEquals(100, $event->getConfidenceLevel());
        $this->assertEquals($eventDate, $event->getEventDate());

        $location = new Location();
        $location->setDescription($description);
        $location->setAddress1($address1);
        $location->setAddress2($address2);
        $location->setAddress3($address3);
        $location->setCity($city);
        $location->setStateProvince($state);
        $location->setPostalCode($postal);
        $location->setCountry($country);

        $this->assertEquals($description, $location->getDescription());
        $this->assertEquals($address1, $location->getAddress1());
        $this->assertEquals($address2, $location->getAddress2());
        $this->assertEquals($address3, $location->getAddress3());
        $this->assertEquals($city, $location->getCity());
        $this->assertEquals($state, $location->getStateProvince());
        $this->assertEquals($postal, $location->getPostalCode());
        $this->assertEquals($country, $location->getCountry());

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
        $event->setEventDate($date);

        $this->assertEquals($date, $event->getEventDate());
        $this->assertEquals($stamp, $event->getEventStamp());
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
