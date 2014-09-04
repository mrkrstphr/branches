<?php

namespace Branches\Form\People\Event;

use Zend\Form\Form;

class SourceCitationForm extends Form
{
    public function __construct(SourceCitationFieldset $fieldset, $name = null, $options = [])
    {
        parent::__construct($name, $options);

        $fieldset
            ->setName('citation')
            ->setOptions(['use_as_base_fieldset' => true]);

        $this->add($fieldset);
    }
}
