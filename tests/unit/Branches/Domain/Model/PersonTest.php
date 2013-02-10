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
    use TimestampedTest, SourcedTest;

    /**
     *
     */
    public function setUp()
    {
        $this->entity = 'Branches\\Domain\\Model\\Person';
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

        $person->addName($primary);
        $this->assertCount(1, $person->getNames());

        $primaryCheck = $person->getConfirmedName();
        $this->assertEquals($primaryCheck, $primary);

        $person->addName($secondary);
        $this->assertCount(2, $person->getNames());

        $primaryCheck = $person->getConfirmedName();
        $this->assertEquals($primaryCheck, $primary);
    }
}
