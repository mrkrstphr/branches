<?php

namespace Application\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 *
 */
class LoginForm extends Form implements InputFilterProviderInterface
{
    /**
     *
     */
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);

        $this->setAttribute('action', '/login')->setAttribute('method', 'post');

        $email = (new Element\Text('email'))->setAttribute('placeholder', 'Email Address');
        $password = (new Element\Password('password'))->setAttribute('placeholder', 'Password');
        $submit = (new Element\Submit('submit'))->setAttribute('class', 'btn primary')->setValue('Log In');

        $this->add($email);
        $this->add($password);
        $this->add($submit);
    }

    /**
     *
     */
    public function getInputFilterSpecification()
    {

    }
}
