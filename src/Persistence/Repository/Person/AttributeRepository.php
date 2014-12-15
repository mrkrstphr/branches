<?php

namespace Branches\Persistence\Repository\Person;

use Branches\Domain\Repository\Person\AttributeRepositoryInterface;
use Branches\Persistence\Repository\AbstractRepository;

/**
 * Class AttributeRepository
 * @package Branches\Persistence\Repository\Person
 */
class AttributeRepository extends AbstractRepository implements AttributeRepositoryInterface
{
    protected $entityClass = 'Branches\Domain\Entity\Person\Attribute';
}
