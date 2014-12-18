<?php

namespace Branches\Fixtures;

use Branches\Domain\Entity\Family\Child;
use Branches\Domain\Entity\Family\Family;

/**
 * Class FamilyFixture
 * @package Branches\Fixtures
 */
class FamilyFixture extends AbstractFixture
{
    /**
     * Create the fixture data.
     */
    public function create()
    {
        $fred = $this->getReference('person-fred-flintstone');
        $wilma = $this->getReference('person-wilma-flintstone');
        $pebbles = $this->getReference('person-pebbles-flintstone');

        $family = new Family();
        $family->addParent($fred)->addParent($wilma);

        $family->addChild((new Child())->setPedigree('birth')->setPerson($pebbles));
    }
}
