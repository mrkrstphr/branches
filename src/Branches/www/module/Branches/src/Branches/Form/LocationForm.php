<?php

namespace Branches\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 *
 */
class LocationForm extends Form implements InputFilterProviderInterface
{
    /**
     *
     */
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);

        $this->setAttribute('action', '')->setAttribute('method', 'post');

        $description = (new Element\Text('description'))
            ->setAttribute('id', 'location-description')
            ->setLabel('Description');

        $address1 = (new Element\Text('address1'));
        $address2 = (new Element\Text('address2'));
        $address3 = (new Element\Text('address3'));

        $this->add($description);
        $this->add($address1);
        $this->add($address2);
        $this->add($address3);
    }

    /**
     *
     */
    public function getInputFilterSpecification()
    {
        return array();
    }
}
