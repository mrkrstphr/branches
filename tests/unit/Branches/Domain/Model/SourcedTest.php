<?php
/**
 *
 */

namespace Branches\Domain\Model;

/**
 *
 */
trait SourcedTest
{
    /**
     * @var string
     */
    protected $entity;

    /**
     *
     */
    public function testTestConfigurated()
    {
        $this->assertNotEmpty($this->entity, 'No entity was configured for Sourced test for ' . get_class($this));
    }

    /**
     *
     */
    public function testInheritsSourced()
    {
        $entity = new $this->entity();

        $this->assertTrue(
            method_exists($entity, 'getSources'),
            get_class($entity) . ' does not have a getSources() method'
        );
    }

    /**
     *
     */
    public function testGettingAndAddingSources()
    {
        $entity = new $this->entity();

        $this->assertCount(0, $entity->getSources());

        $source = new Source();
        $entity->getSources()->add($source);
        $this->assertCount(1, $entity->getSources());

        $sourceDos = new Source();
        $entity->getSOurces()->add($sourceDos);
        $this->assertCount(2, $entity->getSources());
    }
}
