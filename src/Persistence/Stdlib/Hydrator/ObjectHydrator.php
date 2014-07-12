<?php

namespace Branches\Persistence\Stdlib\Hydrator;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Stdlib\Hydrator\HydratorInterface;
use Zend\Stdlib\Hydrator\StrategyEnabledInterface;

/**
 * Class ObjectHydrator
 * @package Branches\Persistence\Stdlib\Hydrator
 */
class ObjectHydrator extends DoctrineObject implements HydratorInterface, StrategyEnabledInterface
{
    /**
     * {@inheritDoc}
     */
    protected function hydrateByValue(array $data, $object)
    {
        foreach ($this->metadata->getIdentifier() as $id) {
            if (isset($data[$id]) and empty($data[$id])) {
                return null;
            }
        }

        return parent::hydrateByValue($data, $object);
    }

    /**
     * {@inheritDoc}
     */
    protected function toOne($target, $value)
    {
        if (!isset($value)) {
            return null;
        }

        if (isset($value['id']) && empty($value['id'])) {
            unset($value['id']);
        }

        return parent::toOne($target, $value);
    }

    /**
     * @todo this will only work for single primary keys, not composite keys
     *
     * @param object $object
     * @param mixed $collectionName
     * @param string $target
     * @param mixed $values
     */
    protected function toMany($object, $collectionName, $target, $values)
    {
        foreach ($values as $index => $value) {
            if (is_array($value)) {
                if (isset($value['id']) && empty($value['id'])) {
                    unset($values[$index]);
                }
            }
        }

        parent::toMany($object, $collectionName, $target, $values);
    }
}
