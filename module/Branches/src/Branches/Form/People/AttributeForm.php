<?php

namespace Branches\Form\People;

use Branches\Domain\Repository\Person\AttributeTypeRepositoryInterface;
use Zend\Form\Element;
use Zend\Form\Form;

/**
 * Class AttributeForm
 * @package Branches\Form\People
 */
class AttributeForm extends Form
{
    /**
     * @var AttributeTypeRepositoryInterface
     */
    protected $attributeTypeRepository;

    /**
     * @param AttributeTypeRepositoryInterface $typeRepo
     * @param string|null $name
     * @param array $options
     */
    public function __construct(AttributeTypeRepositoryInterface $typeRepo, $name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->attributeTypeRepository = $typeRepo;
        $this->create();
    }

    /**
     * Create the form.
     */
    protected function create()
    {
        $this->setAttribute('id', 'person-attribute-form');

        $fieldset = (new AttributeFieldset($this->attributeTypeRepository, 'attribute'))
            ->setOptions(['use_as_base_fieldset' => true]);
        $this->add($fieldset);
    }
}
