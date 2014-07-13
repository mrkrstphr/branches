<?php

namespace Branches\Form\People;

use Branches\Domain\Repository\Event\PersonEventTypeRepositoryInterface;
use Branches\Domain\Repository\Person\AttributeTypeRepositoryInterface;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 * Class AttributeFieldset
 * @package Branches\Form\People
 */
class AttributeFieldset extends Fieldset implements InputFilterProviderInterface
{
    /**
     * @var AttributeTypeRepositoryInterface
     */
    protected $typeRepository;

    /**
     * @param AttributeTypeRepositoryInterface $typeRepository
     * @param string|null $name
     * @param array $options
     */
    public function __construct(AttributeTypeRepositoryInterface $typeRepository, $name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->typeRepository = $typeRepository;

        $this->create();
        $this->populateEventTypes();
    }

    protected function create()
    {
        $this->setAttribute('id', 'person-attribute-form');

        $typeFieldset = new Fieldset('type');
        $typeId = (new Element\Select('id'))->setLabel('Type *');
        $typeFieldset->add($typeId);

        $description = (new Element\Text('description'))->setLabel('Description *');

        $date = (new Element\Text('date'))->setLabel('Date')->setAttribute('maxlength', 35);

        $placeFieldset = (new Fieldset('place'));
        $placeId = new Element\Hidden('id');
        $placeDescription = (new Element\Text('description'))->setLabel('Place');
        $placeFieldset
            ->add($placeId)
            ->add($placeDescription);

        $this
            ->add($typeFieldset)
            ->add($description)
            ->add($date)
            ->add($placeFieldset);
    }

    protected function populateEventTypes()
    {
        $rows = $this->typeRepository->getBy([], ['name' => 'ASC']);

        $eventTypes = ['' => ''];

        foreach ($rows as $row) {
            $eventTypes[$row->getId()] = $row->getName();
        }

        $this->get('type')->get('id')->setAttribute('options', $eventTypes);
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return [
            'description' => [
                'required' => true,
            ],
        ];
    }
}
