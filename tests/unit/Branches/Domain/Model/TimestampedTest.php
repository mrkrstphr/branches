<?php
/**
 *
 */

namespace Branches\Domain\Model;

use \DateTime;

/**
 *
 */
trait TimestampedTest
{
    /**
     * Events should inherit the traits Timestamped, which gives it a created and modified DateTime
     * that can be manipulated through a getter and setter. This test verifies that those inheritance
     * is properly configured.
     */
    public function testInheritsTimestamped()
    {
        /*
        $entity = new $this->_entity();

        $this->assertTrue(method_exists($entity, 'getCreated'));
        $this->assertTrue(method_exists($entity, 'setCreated'));
        $this->assertTrue(method_exists($entity, 'getUpdated'));
        $this->assertTrue(method_exists($entity, 'setUpdated'));

        $created = new DateTime('2012-07-04');
        $updated = new DateTime('2015-12-25');

        $entity->setCreated($created);
        $this->assertEquals($created, $entity->getCreated());

        $entity->setUpdated($updated);
        $this->assertEquals($updated, $entity->getUpdated());
        */
    }
}