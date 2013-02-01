<?php

namespace MyProject\Tests;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\EventManager;
use DoctrineExtensions\PHPUnit\OrmTestCase;

use DoctrineExtensions\PHPUnit\Event\EntityManagerEventArgs,
    Doctrine\ORM\Tools\SchemaTool;

use Branches\Persistence\Repositories\PeopleRepository;

/**
 *
 */
class EntityFunctionalTest extends OrmTestCase
{
    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function createEntityManager()
    {
        $dbParams = include __DIR__ . '/../../src/Branches/config/db.local.php';

        $config = Setup::createXMLMetadataConfiguration(
            array(__DIR__ . '/../../src/Branches/Persistence/mappings'),
            true
        );
        $eventManager = new EventManager();
        $eventManager->addEventListener(array('preTestSetUp'), $this);

        return EntityManager::create($dbParams, $config, $eventManager);
    }

    /**
     * @param \DoctrineExtensions\PHPUnit\Event\EntityManagerEventArgs $eventArgs
     */
    public function preTestSetUp(EntityManagerEventArgs $eventArgs)
    {
        $em = $eventArgs->getEntityManager();

        $schemaTool = new SchemaTool($em);

        $cmf = $em->getMetadataFactory();
        $classes = $cmf->getAllMetadata();
        $schemaTool->dropSchema($classes);
        $schemaTool->createSchema($classes);
    }

    /**
     * @return \PHPUnit_Extensions_Database_DataSet_XmlDataSet
     */
    protected function getDataSet()
    {
        return $this->createXmlDataSet(__DIR__ . '/_files/peopleFixture.xml');
    }

    /**
     *
     */
    public function testPeopleRepository()
    {
        $people = new PeopleRepository();

        $person = $people->getById(1);

        $this->assertEquals(1, $person->getId());
        $this->assertEquals('M', $person->getGender());
        $this->assertCount(2, $person->getEvents());
    }

    /**
     * Returns the database operation executed in test setup.
     *
     * @return \PHPUnit_Extensions_Database_Operation_DatabaseOperation
     */
    protected function getSetUpOperation()
    {
        return new \PHPUnit_Extensions_Database_Operation_Composite(
            array(
                new \PHPUnit_Extensions_Database_Operation_Insert()
            )
        );
    }
}
