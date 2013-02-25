<?php
    /**
     *
     */

namespace Branches\Persistence\Repositories\People;

use Branches\Persistence\Repositories\SourceRepository;
use Branches\Persistence\Test\SqliteInMemory;

class SourceRepositoryTest extends SqliteInMemory
{
    /**
     *
     */
    public function getDataSet()
    {
        $fixturePath = realpath(__DIR__ . '/../../../fixtures');

        return $this->createXmlDataSet($fixturePath . '/sourceFixture.xml');
    }

    /**
     *
     */
    public function testGetById()
    {
        $manager = $this->createEntityManager();
        $repository = new SourceRepository($manager);

        $source = $repository->getById(1);

        $this->assertInstanceOf('\\Branches\\Domain\Model\\Source', $source);
        $this->assertEquals(1, $source->getId());
    }

    /**
     *
     */
    public function testGetAll()
    {
        $manager = $this->createEntityManager();
        $repository = new SourceRepository($manager);

        $sources = $repository->getAll();

        $this->assertCount(1, $sources);

        foreach ($sources as $source) {
            $this->assertInstanceOf('\\Branches\\Domain\Model\\Source', $source);
        }
    }
}
