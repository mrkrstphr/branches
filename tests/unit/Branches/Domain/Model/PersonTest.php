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
     *
     */
    public function testEvents()
    {
        $person = new Person();

        $this->assertCount(0, $person->getEvents());

        $event = new Event();
        $person->getEvents()->add($event);
        $this->assertCount(1, $person->getEvents());
        $this->assertInstanceOf('Branches\Domain\Model\Event', $person->getEvents()->first());
    }

    /**
     *
     */
    public function testRelationships()
    {
        $relationship = new Relationship();
        $person = new Person();

        $this->assertCount(0, $person->getRelationships());

        $person->getRelationships()->add($relationship);
        $this->assertCount(1, $person->getRelationships());
    }

    /**
     *
     */
    public function testAttributes()
    {
        $person = new Person();

        $this->assertCount(0, $person->getAttributes());

        $attribute = new Attribute();
        $person->getAttributes()->add($attribute);
        $this->assertCount(1, $person->getAttributes());
        $this->assertInstanceOf('Branches\Domain\Model\Attribute', $person->getAttributes()->first());
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
