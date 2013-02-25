<?php
/**
 *
 */

namespace Branches\Persistence\Test;

use Doctrine\Common\EventManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\Setup;
use DoctrineExtensions\PHPUnit\OrmTestCase;
use DoctrineExtensions\PHPUnit\Event\EntityManagerEventArgs;

use Branches\Persistence\ConfigurationFactory;
use Branches\Persistence\EntityManagerFactory;

/**
 *
 */
abstract class RepositoryTestAbstract extends OrmTestCase
{
    /**
     * @return array
     */
    abstract protected function getEntityConfiguration();

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function createEntityManager()
    {
        $eventManager = new EventManager();
        $eventManager->addEventListener(array('preTestSetUp'), $this);

        $configurationFactory = new ConfigurationFactory();
        $configurationFactory->loadConfiguration($this->getEntityConfiguration());
        $configurationFactory->setEventManager($eventManager);

        $entityManagerFactory = new EntityManagerFactory($configurationFactory);
        $entityManager = $entityManagerFactory->getSingleton();

        return $entityManager;
    }

    /**
     * @param EntityManagerEventArgs $eventArgs
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
