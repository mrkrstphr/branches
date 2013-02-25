<?php
    /**
     *
     */

namespace Branches\Persistence\Repositories;

use Branches\Persistence\Repositories\LocationRepository;
use Branches\Persistence\Test\SqliteInMemory;

class LocationRepositoryTest extends SqliteInMemory
{
    /**
     *
     */
    public function getDataSet()
    {
        $fixturePath = realpath(__DIR__ . '/../../../fixtures');

        return $this->createXmlDataSet($fixturePath . '/locationFixture.xml');
    }

    /**
     *
     */
    public function testGetById()
    {
        $manager = $this->createEntityManager();
        $repository = new LocationRepository($manager);

        $location = $repository->getById(1);

        $this->assertInstanceOf('\\Branches\\Domain\Model\\Location', $location);
        $this->assertEquals(1, $location->getId());
    }

    /**
     *
     */
    public function testGetAll()
    {
        $manager = $this->createEntityManager();
        $repository = new LocationRepository($manager);

        $locations = $repository->getAll();

        $this->assertCount(2, $locations);

        foreach ($locations as $location) {
            $this->assertInstanceOf('\\Branches\\Domain\Model\\Location', $location);
        }
    }
}
