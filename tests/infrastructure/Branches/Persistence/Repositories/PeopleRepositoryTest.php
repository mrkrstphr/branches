<?php
/**
 *
 */

namespace Branches\Persistence\Repositories\People;

use Branches\Domain\Model\Person;
use Branches\Persistence\Repositories\PeopleRepository;
use Branches\Persistence\Test\SqliteInMemory;

class PeopleRepositoryTest extends SqliteInMemory
{
    /**
     *
     */
    public function getDataSet()
    {
        $fixturePath = realpath(__DIR__ . '/../../../fixtures');

        return $this->createXmlDataSet($fixturePath . '/peopleFixture.xml');
    }

    /**
     *
     */
    public function testGetById()
    {
        $entityManager = $this->createEntityManager();
        $repository = new PeopleRepository($entityManager);

        $person = $repository->getById(1);

        $this->assertInstanceOf('\\Branches\\Domain\\Model\\Person', $person);
        $this->assertEquals(1, $person->getId());
        $this->assertEquals('M', $person->getGender());

        $this->assertCount(2, $person->getEvents());

        foreach ($person->getEvents() as $event) {
            $this->assertInstanceOf('\\Branches\\Domain\\Model\\Event', $event);
        }
    }

    /**
     *
     */
    public function testGetAll()
    {
        $entityManager = $this->createEntityManager();
        $repository = new PeopleRepository($entityManager);

        $people = $repository->getAll();

        $this->assertCount(2, $people);


        foreach ($people as $person) {
            $this->assertInstanceOf('\\Branches\\Domain\\Model\\Person', $person);
        }
    }

    /**
     *
     */
    public function testGetBy()
    {
        $entityManager = $this->createEntityManager();
        $repository = new PeopleRepository($entityManager);

        $people = $repository->getBy(array('gender' => 'F'));

        $this->assertCount(1, $people);

        foreach ($people as $person) {
            $this->assertInstanceOf('\\Branches\\Domain\\Model\\Person', $person);
        }
    }

    /**
     *
     */
    public function testUpdate()
    {
        $entityManager = $this->createEntityManager();
        $repository = new PeopleRepository($entityManager);

        $person = new Person();
        $person->setGender('F');
        $person->setRefId('I0014');

        $repository->store($person)->flush();

        $this->assertNotEmpty($person->getId());

        $result = $repository->getById($person->getId());

        $this->assertEquals($person, $result);
    }

    /**
     *
     */
    public function testDelete()
    {
        $entityManager = $this->createEntityManager();
        $repository = new PeopleRepository($entityManager);

        $repository->delete(1)->flush();

        $people = $repository->getAll();

        $this->assertCount(1, $people);
    }
}
