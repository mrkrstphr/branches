<?php
/**
 *
 */

namespace Branches\Domain\Model;

/**
 *
 */
trait NotedTest
{
    /**
     *
     */
    public function testNotedConfigurated()
    {
        $this->assertNotEmpty($this->entity, 'No entity was configured for Noted test for ' . get_class($this));
    }

    /**
     *
     */
    public function testInheritsNoted()
    {
        $entity = new $this->entity();

        $this->assertTrue(
            method_exists($entity, 'getNotes'),
            get_class($entity) . ' does not have a getNotes() method'
        );
    }

    /**
     *
     */
    public function testGettingAndAddingNotes()
    {
        $entity = new $this->entity();

        $this->assertCount(0, $entity->getNotes());

        $note = new Note();
        $entity->getNotes()->add($note);
        $this->assertCount(1, $entity->getNotes());

        $noteDos = new Note();
        $entity->getNotes()->add($noteDos);
        $this->assertCount(2, $entity->getNotes());
    }
}
