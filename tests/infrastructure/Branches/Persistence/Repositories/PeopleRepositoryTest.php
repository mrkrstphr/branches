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
    public function testRelationshipLoading()
    {
        $repository = new PeopleRepository($this->createEntityManager());

        $person = $repository->getById(1);

        $this->assertCount(1, $person->getRelationships());

        $relationships = $person->getRelationships();

        $this->assertInstanceOf('\\Branches\\Domain\\Model\\Person', $relationships[0]->getSpouseOf($person));
        $this->assertEquals(2, $relationships[0]->getSpouseOf($person)->getId());
    }

    /**
     *
     */
    public function testParentLoading()
    {
        $repository = new PeopleRepository($this->createEntityManager());

        $person = $repository->getById(3);

        $parents = $person->getConfirmedParents();

        $this->assertInstanceOf('\\Branches\\Domain\\Model\\Parents', $parents);

        $this->assertEquals('BIRTH', $parents->getPedigree());

        $this->assertInstanceOf('\\Branches\\Domain\\Model\\Relationship', $parents->getRelationship());

        $relationship = $parents->getRelationship();

        $this->assertEquals(1, $relationship->getFather()->getId());
        $this->assertEquals(2, $relationship->getMother()->getId());
    }

    /**
     *
     */
    public function testGetAll()
    {
        $entityManager = $this->createEntityManager();
        $repository = new PeopleRepository($entityManager);

        $people = $repository->getAll();

        $this->assertCount(3, $people);


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

        $this->assertCount(2, $people);

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

        $this->assertCount(2, $people);
    }
}
