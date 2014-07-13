<?php

namespace Branches\Persistence\Repository\Person;

use Branches\Domain\Repository\Person\AttributeTypeRepositoryInterface;
use Branches\Persistence\Repository\AbstractRepository;

/**
 * Class AttributeTypeRepository
 * @package Branches\Persistence\Repository\Person
 */
class AttributeTypeRepository extends AbstractRepository implements AttributeTypeRepositoryInterface
{
    /**
     * @var string
     */
    protected $entityClass = 'Branches\Domain\Entity\Person\AttributeType';
}
