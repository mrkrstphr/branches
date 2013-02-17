<?php
/**
 *
 */

namespace Branches\Domain\Model;

use \DateTime;

/**
 * Provides unit testing against the Relationship object.
 */
class RelationshipTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests creating and retrieving relationships between persons.
     */
    public function testRelationships()
    {
        $relationship = new Relationship();
        $wife = new Person();
        $wife->getNames()->add(new Name('Mary Ann', 'Todd', 100));
        $wife->setGender('F');

        $this->assertFalse($relationship->getMother());
        $this->assertFalse($relationship->getFather());

        $husband = new Person();
        $husband->getNames()->add(new Name('Abraham', 'Lincoln', 100));
        $husband->setGender('M');

        $relationship->getParents()->add($wife);
        $wife->getRelationships()->add($relationship);

        $this->assertFalse($relationship->getSpouseOf($wife));

        $relationship->getParents()->add($husband);
        $husband->getRelationships()->add($relationship);

        $this->assertCount(2, $relationship->getParents());

        $this->assertEquals($wife, $relationship->getSpouseOf($husband));
        $this->assertEquals($husband, $relationship->getSpouseOf($wife));

        $this->assertCount(1, $wife->getRelationships());
        $this->assertCount(1, $husband->getRelationships());
    }

    /**
     *
     */
    public function testSameSexFemaleUnion()
    {
        $wife = new Person();
        $wife->getNames()->add(new Name('Mary Ann', 'Todd', 100));
        $wife->setGender('F');

        $wife2 = new Person();
        $wife2->getNames()->add(new Name('Mary\'s', 'Mistress', 10));
        $wife2->setGender('F');

        $relationship = new Relationship();
        $relationship->getParents()->add($wife);
        $relationship->getParents()->add($wife2);

        $this->assertEquals($wife2, $relationship->getMother());
        $this->assertEquals($wife, $relationship->getFather());

        $this->assertEquals($wife, $relationship->getSpouseOf($wife2));
        $this->assertEquals($wife2, $relationship->getSpouseOf($wife));
    }

    /**
     *
     */
    public function testSameSexMaleUnion()
    {
        $husband = new Person();
        $husband->getNames()->add(new Name('Abraham', 'Lincoln', 100));
        $husband->setGender('M');

        $husband2 = new Person();
        $husband2->getNames()->add(new Name('Abe\'s', 'Mister', 100));
        $husband2->setGender('M');

        $relationship = new Relationship();
        $relationship->getParents()->add($husband);
        $relationship->getParents()->add($husband2);

        $this->assertEquals($husband2, $relationship->getMother());
        $this->assertEquals($husband, $relationship->getFather());

        $this->assertEquals($husband, $relationship->getSpouseOf($husband2));
        $this->assertEquals($husband2, $relationship->getSpouseOf($husband));
    }

    /**
     *
     */
    public function testRelationshipChildren()
    {

    }
}
