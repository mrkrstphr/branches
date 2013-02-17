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

        $this->assertEquals($wife, $relationship->getMother());
        $this->assertEquals($husband, $relationship->getFather());

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
        $mother = new Person();
        $mother->getNames()->add(new Name('Mary Ann', 'Todd'));

        $father = new Person();
        $father->getNames()->add(new Name('Abraham', 'Lincoln'));

        $child = new Person();
        $child->getNames()->add(new Name('Todd', 'Lincoln'));

        $relationship = new Relationship();
        $relationship->getParents()->add($mother);
        $relationship->getParents()->add($father);

        $parent = new Parents();
        $parent->setPerson($child);
        $parent->setRelationship($relationship);
        $parent->setPedigree('birth');

        $child->getParents()->add($parent);

        $this->assertEquals($child, $parent->getPerson());
        $this->assertEquals($relationship, $parent->getRelationship());
        $this->assertEquals('birth', $parent->getPedigree());

        $this->assertEquals($parent, $child->getConfirmedParents());

        $this->assertCount(1, $relationship->getChildren());
    }

    /**
     *
     */
    public function testMultipleParents()
    {
        $child = new Person();
        $child2 = new Person();
        $child3 = new Person();

        $parentAdop = new Parents();
        $parentAdop->setPedigree('adopted');

        $parentBirt = new Parents();
        $parentBirt->setPedigree('birth');

        $parentFost = new Parents();
        $parentFost->setPedigree('foster');

        $child->getParents()->add($parentAdop);
        $child->getParents()->add($parentBirt);

        $child2->getParents()->add($parentBirt);
        $child2->getParents()->add($parentAdop);

        $child3->getParents()->add($parentFost);
        $child3->getParents()->add($parentBirt);

        $this->assertEquals($parentAdop, $child->getConfirmedParents());
        $this->assertEquals($parentAdop, $child2->getConfirmedParents());
        $this->assertEquals($parentBirt, $child3->getConfirmedParents());
    }
}
