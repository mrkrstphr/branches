<?php

namespace Branches\Controller\People;

use Branches\Domain\Entity\Person\Attribute;
use Branches\Domain\Repository\PersonRepositoryInterface;
use Branches\Form\People\AttributeForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

/**
 * Class AttributeController
 * @package Branches\Controller\People\AttributeController
 */
class AttributesController extends AbstractActionController
{
    /**
     * @var PersonRepositoryInterface
     */
    protected $personRepository;

    /**
     * @var AttributeForm
     */
    protected $attributeForm;

    /**
     * @param PersonRepositoryInterface $personRepository
     * @param AttributeForm $attributeForm
     */
    public function __construct(PersonRepositoryInterface $personRepository, AttributeForm $attributeForm)
    {
        $this->personRepository = $personRepository;
        $this->attributeForm = $attributeForm;
    }

    /**
     * Displays all attributes for a given person. This action is terminal.
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        $personId = $this->params()->fromRoute('id');
        $person = $this->personRepository->getById($personId);

        $viewModel = new ViewModel(['person' => $person]);
        $viewModel
            ->setTemplate('branches/people/attributes/index')
            ->setTerminal(true);

        return $viewModel;
    }

    /**
     * Add a new attribute to a given person. This action returns a mix of JsonModel and ViewModel.
     *
     * @return JsonModel|ViewModel
     */
    public function addAction()
    {
        $id = $this->params()->fromRoute('id');
        $person = $this->personRepository->getById($id);

        $attribute = (new Attribute())->setPerson($person);

        $this->attributeForm->bind($attribute);

        if ($this->getRequest()->isPost()) {
            $this->attributeForm->setData($this->request->getPost());
            if ($this->attributeForm->isValid()) {
                $this->personRepository
                    ->persist($attribute)
                    ->flush();

                return new JsonModel(['success' => true]);
            }
        }

        return (new ViewModel([
            'id' => $id,
            'form' => $this->attributeForm
        ]))->setTerminal(true)->setTemplate('branches/people/attributes/add');
    }
}
