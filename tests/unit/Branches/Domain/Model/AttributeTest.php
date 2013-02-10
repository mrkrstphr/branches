<?php
/**
 *
 */

namespace Branches\Domain\Model;

/**
 *
 */
class AttributeTest extends \PHPUnit_Framework_TestCase
{
    use NotedTest;
    use SourcedTest;
    use TimestampedTest;

    /**
     *
     */
    public function setUp()
    {
        $this->entity = 'Branches\\Domain\\Model\\Attribute';
    }

    /**
     *
     */
    public function testAttributes()
    {
        $type = 'EDUC';
        $date = 'Between 1 Aug 1900 and 6 Jun 1901';

        $attribute = new Attribute();
        $attribute->setType($type);
        $attribute->setDescription('Xavier\'s School for the Gifted Youngsters');
        $attribute->setCertainty(100);
        $attribute->setDate($date);
        $attribute->setAge(14);
        $attribute->setCause('Needed an education');

        $this->assertEquals($type, $attribute->getType());
        $this->assertEquals('Xavier\'s School for the Gifted Youngsters', $attribute->getDescription());
        $this->assertEquals(100, $attribute->getCertainty());
        $this->assertEquals($date, $attribute->getDate());
        $this->assertEquals(14, $attribute->getAge());
        $this->assertEquals('Needed an education', $attribute->getCause());

        $location = new Location();
        $attribute->setLocation($location);
        $this->assertEquals($location, $attribute->getLocation());
    }

    /**
     *
     * @dataProvider dateProvider
     * @param string $date
     * @param string $stamp
     */
    public function testDateStamp($date, $stamp)
    {
        $attribute = new Attribute();
        $attribute->setDate($date);

        $this->assertEquals($date, $attribute->getDate());
        $this->assertEquals($stamp, $attribute->getStamp());
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
