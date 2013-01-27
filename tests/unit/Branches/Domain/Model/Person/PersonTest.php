<?php
/**
 *
 */

namespace Branches\Domain\Model\Person;

use \DateTime;

/**
 * Provides unit testing against the Person object and it's related objects.
 */
class PersonTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Person should inherit the traits Timestamped, which gives them a created and modified DateTime
     * that can be manipulated through a getter and setter. This test verifies that those inheritance
     * is properly configured.
     */
    public function testInheritsTraits()
    {
        $person = new Person();

        $this->assertTrue(method_exists($person, 'getCreated'));
        $this->assertTrue(method_exists($person, 'setCreated'));
        $this->assertTrue(method_exists($person, 'getUpdated'));
        $this->assertTrue(method_exists($person, 'setUpdated'));

        $created = new DateTime('2012-07-04');
        $updated = new DateTime('2015-12-25');

        $person->setCreated($created);
        $this->assertEquals($created, $person->getCreated());

        $person->setUpdated($updated);
        $this->assertEquals($updated, $person->getUpdated());
    }
}
