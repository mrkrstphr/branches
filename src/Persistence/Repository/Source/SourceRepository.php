<?php

namespace Branches\Persistence\Repository\Source;

use Branches\Domain\Repository\Source\SourceRepositoryInterface;
use Branches\Persistence\Repository\AbstractRepository;

/**
 * Class SourceRepository
 * @package Branches\Persistence\Repository\Source
 */
class SourceRepository extends AbstractRepository implements SourceRepositoryInterface
{
    /**
     * @var string
     */
    protected $entityClass = 'Branches\Domain\Entity\Source\Source';
}
