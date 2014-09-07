<?php

namespace Branches\Form\Authentication;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator\EmailAddress;

/**
 * Class LoginForm
 * @package Login\Form
 */
class LoginForm extends Form implements InputFilterProviderInterface
{
    /**
     * Constructor.
     *
     * @param string|null $name
     * @param array $options
     */
    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        $email = (new Element\Email('email'))
            ->setLabel('Email')
            ->setAttribute('autocomplete', 'off');

        $email->setEmailValidator(
            new EmailAddress(
                ['breakChainOnfailure' => true, 'messages' => [EmailAddress::INVALID_FORMAT => 'Email is invalid']]
            )
        );
        $password = (new Element\Password('password'))
            ->setLabel('Password')
            ->setAttribute('autocomplete', 'off');

        $this->add($email);
        $this->add($password);
    }

    /**
     * @param boolean $isValid
     * @return $this
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid === true;
        return $this;
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return [
            'email' => [
                'breakChainOnFailure' => true,
                'required' => true,
                'filters' => [
                    ['name' => 'Zend\Filter\StringTrim'],
                    ['name' => 'Zend\Filter\StripNewlines'],
                ],
                'validators' => [
                    ['name' => 'Zend\Validator\NotEmpty', 'options' => ['breakChainOnfailure' => true]],
                ],
            ],
            'password' => [
                'required' => true,
                'filters' => [],
                'validators' => [
                    ['name' => 'Zend\Validator\NotEmpty']
                ],
            ],
        ];
    }
}
