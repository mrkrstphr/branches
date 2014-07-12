<?php

namespace Branches\Form\People;

use Branches\Domain\Repository\Event\PersonEventTypeRepositoryInterface;
use Zend\Form\Element;
use Zend\Form\Fieldset;

/**
 * Class EventFieldset
 * @package Branches\Form\People
 */
class EventFieldset extends Fieldset
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
        $this->populateEventTypes();
    }

    protected function create()
    {
        $this->setAttribute('id', 'person-event-form');

        $typeFieldset = new Fieldset('type');
        $typeId = (new Element\Select('id'))->setLabel('Type: ');
        $typeFieldset->add($typeId);

        $date = (new Element\Text('date'))->setLabel('Date: ')->setAttribute('maxlength', 35);

        $placeFieldset = (new Fieldset('place'));
        $placeId = new Element\Hidden('id');
        $description = (new Element\Text('description'))->setLabel('Place: ');
        $placeFieldset
            ->add($placeId)
            ->add($description);

        $this
            ->add($typeFieldset)
            ->add($date)
            ->add($placeFieldset);
    }

    protected function populateEventTypes()
    {
        $rows = $this->eventTypeRepository->getBy([], ['name' => 'ASC']);

        $eventTypes = ['' => ''];

        foreach ($rows as $row) {
            $eventTypes[$row->getId()] = $row->getName();
        }

        $this->get('type')->get('id')->setAttribute('options', $eventTypes);
    }
}
