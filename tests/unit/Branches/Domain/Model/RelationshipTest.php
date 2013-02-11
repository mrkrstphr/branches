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
    public function testSameSexUnion()
    {
//        $wife2 = new Person();
//        $wife2->getNames()->add(new Name('Mary\'s', 'Mistress', 10));
//        $wife2->setGender('F');
//
//        $relationship = new Relationship();
//        $relationship->getParents()->add($wife);
//        $relationship->getParents()->add($wife2);
//
//
//        $this->assertEquals($wife2, $relationship->getMother());
//        $this->assertEquals($wife, $relationship->getFather());
    }

    /**
     *
     */
    public function testRelationshipChildren()
    {
//        $this->_createRelationship();
//
//        $child = new Person();
//        $child->addName(new Name('Robert Todd', 'Lincoln', 100));
//
//        $this->relationship->addChild($child, 'birth');
//
//        $this->assertCount(1, $this->relationship->getChildren());
//
//        $parents = $child->getConfirmedParents();
//        $this->assertInstanceOf('Branches\\Domain\\Model\\Relationship', $parents);
//
//        $this->assertEquals($this->wife, $parents->getMother());
//        $this->assertEquals($this->husband, $parents->getFather());
//
//        $this->assertCount(1, $child->getParents());
//        $this->assertEquals(Relationship::BIRTH, key($child->getParents()));
//        $this->assertCount(1, current($child->getParents()));
//        $this->assertCount(1, $child->getParents(Relationship::BIRTH));
//
//        $this->assertCount(0, $child->getParents('adopted'));
    }
}
