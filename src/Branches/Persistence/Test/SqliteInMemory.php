<?php
/**
 *
 */

namespace Branches\Persistence\Test;

abstract class SqliteInMemory extends RepositoryTestAbstract
{
    /**
     * Sets up a sqlite in Memory Test Environment.
     *
     * @return array
     */
    protected function getEntityConfiguration()
    {
        $config = array(
            'params' => array(
                'driver' => 'pdo_sqlite',
                //'path' => __DIR__ . '/test.db'
                'memory' => true
            ),
            'mappings' => array(
                realpath(__DIR__ . '/../mappings')
            )
        );

        return $config;
    }
}
