<?php
/**
 *
 */

namespace Branches\Domain\Model;

/**
 * Provides unit testing against the Person object and it's related objects.
 */
class PersonTest extends \PHPUnit_Framework_TestCase
{
    use NotedTest;
    use TimestampedTest;
    use SourcedTest;

    /**
     *
     */
    public function setUp()
    {
        $this->entity = 'Branches\\Domain\\Model\\Person';
    }

    /**
     *
     */
    public function testPerson()
    {
        $person = new Person();
        $person->setGender('M');
        $person->setRefId('I2012');

        $this->assertEquals('M', $person->getGender());
        $this->assertEquals('I2012', $person->getRefId());
    }

    /**
     *
     */
    public function testIncorrectGender()
    {
        $this->setExpectedException('\Exception');

        $person = new Person();
        $person->setGender('Male');
    }

    /**
     * A person should have one or more names, with one of those names being considered their primary
     * name.
     */
    public function testPersonNaming()
    {
        $person = new Person();
        $person->setId(1441);

        $this->assertEquals(1441, $person->getId());

        $primary = new Name('Kristopher Lee', 'Wilson', 100);
        $secondary = new Name('Chris', 'Wilson', 80);

        $person->getNames()->add($secondary);
        $this->assertCount(1, $person->getNames());

        $primaryCheck = $person->getConfirmedName();
        $this->assertEquals($primaryCheck, $secondary);

        $person->getNames()->add($primary);
        $this->assertCount(2, $person->getNames());

        $primaryCheck = $person->getConfirmedName();
        $this->assertEquals($primaryCheck, $primary);
    }
}
