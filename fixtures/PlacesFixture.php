<?php

namespace Branches\Fixtures;

use Branches\Domain\Entity\Place\Place;

/**
 * Class PlacesFixture
 * @package Branches\Fixtures
 */
class PlacesFixture extends AbstractFixture
{
    public function create()
    {
        $grandRapids = new Place();
        $grandRapids->setDescription('Grand Rapids, Michigan, USA');
        $grandRapids->setCity('Grand Rapids');
        $grandRapids->setStateProvince('Michigan');
        $grandRapids->setCountry('United States');

        $this->persist($grandRapids, 'place-grand-rapids');

        $kentwood = new Place();
        $kentwood->setDescription('Kentwood, Michigan, USA');
        $kentwood->setCity('Kentwood');
        $kentwood->setStateProvince('Michigan');
        $kentwood->setCountry('United States');

        $this->persist($kentwood, 'place-kentwood');
    }
}
