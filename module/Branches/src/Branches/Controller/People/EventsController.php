<?php

namespace Branches\Controller\People;

use Branches\Domain\Entity\Person\Event;
use Branches\Domain\Repository\PersonRepositoryInterface;
use Branches\Form\People\EventForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

/**
 * Class EventsController
 * @package Branches\Controller
 */
class EventsController extends AbstractActionController
{
    /**
     * @var PersonRepositoryInterface
     */
    protected $personRepository;

    /**
     * @var EventForm
     */
    protected $eventForm;

    /**
     * @param PersonRepositoryInterface $personRepository
     * @param EventForm $eventForm
     */
    public function __construct(PersonRepositoryInterface $personRepository, EventForm $eventForm)
    {
        $this->personRepository = $personRepository;
        $this->eventForm = $eventForm;
    }

    /**
     * Displays all events for a given person. This action is terminal.
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        $personId = $this->params()->fromRoute('id');
        $person = $this->personRepository->getById($personId);

        $viewModel = new ViewModel(['person' => $person]);
        $viewModel
            ->setTemplate('branches/people/events/index')
            ->setTerminal(true);

        return $viewModel;
    }

    /**
     * Add a new event to a given person. This action returns a mix of JsonModel and ViewModel.
     *
     * @return JsonModel|ViewModel
     */
    public function addAction()
    {
        $id = $this->params()->fromRoute('id');
        $person = $this->personRepository->getById($id);

        $event = (new Event())->setPerson($person);

        $this->eventForm->bind($event);

        if ($this->getRequest()->isPost()) {
            $this->eventForm->setData($this->request->getPost());
            if ($this->eventForm->isValid()) {
                $this->personRepository
                    ->persist($event)
                    ->flush();

                return new JsonModel(['success' => true]);
            }
        }

        return (new ViewModel([
            'id' => $id,
            'form' => $this->eventForm
        ]))->setTerminal(true)->setTemplate('branches/people/events/add');
    }
}
