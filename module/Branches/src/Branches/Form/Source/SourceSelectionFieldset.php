<?php

namespace Branches\Form\Source;

use Branches\Domain\Repository\Source\SourceRepositoryInterface;
use Zend\Form\Element\Select;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

/**
 * Class SourceSelectionFieldset
 * @package Branches\Form\Source
 */
class SourceSelectionFieldset extends Fieldset implements InputFilterProviderInterface
{
    /**
     * @var SourceRepositoryInterface
     */
    protected $sourceRepository;

    /**
     * @param SourceRepositoryInterface $sourceRepo
     * @param string|null $name
     * @param array $options
     */
    public function __construct(SourceRepositoryInterface $sourceRepo, $name = null, $options = [])
    {
        parent::__construct($name, $options);

        $this->sourceRepository = $sourceRepo;

        $this->create();
    }

    /**
     * Create the form definition
     */
    protected function create()
    {
        $sources = ['' => ''] + $this->sourceRepository->getList('id', 'name');

        $id = (new Select('id'))
            ->setLabel('Source: ')
            ->setAttributes(['options' => $sources]);

        $this->add($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getInputFilterSpecification()
    {
        return [
            'id' => [
                'required' => true
            ]
        ];
    }
}
