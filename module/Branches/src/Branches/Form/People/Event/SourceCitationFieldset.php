<?php

namespace Branches\Form\People\Event;

use Branches\Form\Source\SourceSelectionFieldset;
use Zend\Form\Element\Text;
use Zend\Form\Fieldset;

/**
 * Class SourceCitationFieldset
 * @package Branches\Form\People\Event
 */
class SourceCitationFieldset extends Fieldset
{
    /**
     * @param SourceSelectionFieldset $sourceFieldset
     * @param string|null $name
     * @param array $options
     */
    public function __construct(SourceSelectionFieldset $sourceFieldset, $name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->create($sourceFieldset);
    }

    /**
     * Create the form definition.
     *
     * @param SourceSelectionFieldset $sourceFieldset
     */
    protected function create(SourceSelectionFieldset $sourceFieldset)
    {
        $this->setAttribute('id', 'person-attribute-form');

        $page = (new Text('page'))->setLabel('Page: ');
        $text = (new Text('text'))->setLabel('Text: ')->setAttribute('rows', 10);

        $this->add($sourceFieldset);
        $this->add($page);
        $this->add($text);
    }
}
