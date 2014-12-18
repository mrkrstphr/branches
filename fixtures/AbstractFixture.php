<?php

namespace Branches\Fixtures;

use Doctrine\ORM\EntityManager;

/**
 * Class AbstractFixture
 * @package Branches\Fixtures
 */
abstract class AbstractFixture
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var array
     */
    protected $references = [];

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Create the fixture data.
     */
    abstract public function create();

    /**
     * @param object $object
     * @param string $reference
     */
    protected function persist($object, $reference = '')
    {
        if ($reference) {
            $this->references[$reference] = $object;
        }

        $this->entityManager->persist($object);
    }
}
