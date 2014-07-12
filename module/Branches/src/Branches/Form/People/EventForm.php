<?php

namespace Branches\Form\People;

use Branches\Domain\Repository\Event\PersonEventTypeRepositoryInterface;
use Zend\Form\Element;
use Zend\Form\Form;

/**
 * Class EventForm
 * @package Branches\Form\People
 */
class EventForm extends Form
{
    /**
     * @var PersonEventTypeRepositoryInterface
     */
    protected $eventTypeRepository;

    /**
     * @param PersonEventTypeRepositoryInterface $eventTypeRepo
     * @param string|null $name
     * @param array $options
     */
    public function __construct(PersonEventTypeRepositoryInterface $eventTypeRepo, $name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->eventTypeRepository = $eventTypeRepo;

        $this->create();
    }

    protected function create()
    {
        $this->setAttribute('id', 'person-event-form');

        $fieldset = (new EventFieldset($this->eventTypeRepository, 'event'))
            ->setOptions(['use_as_base_fieldset' => true]);
        $this->add($fieldset);
    }
}
