<?php
/**
 *
 */

namespace Branches\Domain\Model;

use \DateTime,
    Branches\Domain\Model\Person\Person,
    Branches\Domain\Model\Person\Name;

/**
 * Provides unit testing against the Relationship object.
 */
class RelationshipTest extends \PHPUnit_Framework_TestCase
{
    protected $_relationship = null;
    protected $_husband = null;
    protected $_wife = null;

    /**
     *
     */
    protected function _createRelationship()
    {
        $this->_relationship = new Relationship();
        $this->_wife = new Person();
        $this->_wife->addName(new Name('Mary Ann', 'Todd', 100));
        $this->_wife->setGender('F');

        $this->_husband = new Person();
        $this->_husband->addName(new Name('Abraham', 'Lincoln', 100));
        $this->_husband->setGender('M');

        $this->_relationship->addParent($this->_wife);
        $this->_relationship->addParent($this->_husband);
    }

    /**
     * Tests creating and retrieving relationships between persons.
     */
    public function testRelationships()
    {
        $this->_createRelationship();

        $this->assertCount(2, $this->_relationship->getParents());

        $this->assertCount(1, $this->_wife->getRelationships());
        $this->assertCount(1, $this->_husband->getRelationships());

        $this->assertEquals($this->_husband, $this->_relationship->getSpouseOf($this->_wife));
        $this->assertEquals($this->_wife, $this->_relationship->getSpouseOf($this->_husband));
    }

    /**
     *
     */
    public function testRelationshipChildren()
    {
        $this->_createRelationship();

        $child = new Person();
        $child->addName(new Name('Robert Todd', 'Lincoln', 100));

        $this->_relationship->addChild($child, 'birth');

        $this->assertCount(1, $this->_relationship->getChildren());

        $parents = $child->getConfirmedParents();
        $this->assertInstanceOf('Branches\\Domain\\Model\\Relationship', $parents);

        $this->assertEquals($this->_wife, $parents->getMother());
        $this->assertEquals($this->_husband, $parents->getFather());

        $this->assertCount(1, $child->getParents());
        $this->assertEquals(Relationship::BIRTH, key($child->getParents()));
        $this->assertCount(1, current($child->getParents()));
        $this->assertCount(1, $child->getParents(Relationship::BIRTH));

        $this->assertCount(0, $child->getParents('adopted'));
    }
}
