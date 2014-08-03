<?php

namespace Branches\Form\People\Event;

use Zend\Form\Fieldset;

/**
 * Class SourceCitationFieldset
 * @package Branches\Form\People\Event
 */
class SourceCitationFieldset extends Fieldset
{
    /**
     * @param string|null $name
     * @param array $options
     */
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->create();
    }

    /**
     * Create the form definition
     */
    protected function create()
    {
        $this->setAttribute('id', 'person-attribute-form');

        // source Id
        // page
        // text
    }
}
