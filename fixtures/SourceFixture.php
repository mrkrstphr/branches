<?php

namespace Branches\Fixtures;

use Branches\Domain\Entity\Source\Source;

/**
 * Class SourceFixture
 * @package Branches\Fixtures
 */
class SourceFixture extends AbstractFixture
{
    /**
     * Create the fixture data.
     */
    public function create()
    {
        $press = new Source();
        $press->setTitle('The Grand Rapids Press');

        $this->persist($press, 'source-grand-rapids-press');
    }
}
