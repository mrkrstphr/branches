<?php

namespace Branches\Fixtures;

use Branches\Domain\Entity\Person\Name;
use Branches\Domain\Entity\Person\Person;

/**
 * Class PeopleFixture
 * @package Branches\Fixtures
 */
class PeopleFixture extends AbstractFixture
{
    /**
     * Create the fixture data.
     */
    public function create()
    {
        $fred = new Person();
        $fred->setId(1444);
        $fred->addName(new Name('Fred', 'Flintstone'));

        $this->persist($fred, 'person-fred-flintstone');

        $wilma = new Person();
        $wilma->setId(1443);
        $wilma->addName(new Name('Wilma', 'Flintstone'));

        $this->persist($wilma, 'person-wilma-flintstone');

        $pebbles = new Person();
        $pebbles->setId(1442);
        $pebbles->addName(new Name('Pebbles', 'Flintstone'));

        $this->persist($pebbles);
    }
}
