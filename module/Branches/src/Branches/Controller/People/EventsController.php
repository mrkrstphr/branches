<?php

namespace Branches\Controller\People;

use Branches\Domain\Entity\Person\Event;
use Branches\Domain\Repository\Person\EventRepositoryInterface;
use Branches\Domain\Repository\PersonRepositoryInterface;
use Branches\Form\People\Event\SourceCitationForm;
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
     * @var EventRepositoryInterface
     */
    protected $eventRepository;

    /**
     * @var EventForm
     */
    protected $eventForm;

    /**
     * @var SourceCitationForm
     */
    protected $sourceForm;

    /**
     * @param PersonRepositoryInterface $personRepository
     * @param EventRepositoryInterface $eventRepository
     * @param EventForm $eventForm
     * @param SourceCitationForm $sourceForm
     */
    public function __construct(
        PersonRepositoryInterface $personRepository,
        EventRepositoryInterface $eventRepository,
        EventForm $eventForm,
        SourceCitationForm $sourceForm
    ) {
        $this->personRepository = $personRepository;
        $this->eventRepository = $eventRepository;
        $this->eventForm = $eventForm;
        $this->sourceForm = $sourceForm;
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
        $personId = $this->params()->fromRoute('id');
        $person = $this->personRepository->getById($personId);

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
            'id' => $personId,
            'form' => $this->eventForm
        ]))->setTerminal(true)->setTemplate('branches/people/events/add');
    }

    /**
     * @return ViewModel
     */
    public function sourcesAction()
    {
        $eventId = $this->params()->fromRoute('id');
        $event = $this->eventRepository->getById($eventId);

        return (new ViewModel(['event' => $event]))
            ->setTerminal(true)
            ->setTemplate('branches/people/events/sources');
    }

    public function addSourceAction()
    {
        $eventId = $this->params()->fromRoute('id');

        $event = $this->eventRepository->getById($eventId);

        if ($this->getRequest()->isPost()) {
            $this->sourceForm->setData($this->request->getPost());
            if ($this->sourceForm->isValid()) {
                $citation = $this->sourceForm->getObject();
                $citation->setEvent($event);

                $this->eventRepository->persist($citation)->flush();

                return new JsonModel([
                    'success' => true,
                    'sources' => count($event->getSources())
                ]);
            }
        }

        return (new ViewModel([
            'id' => $eventId,
            'form' => $this->sourceForm
        ]))->setTerminal(true)->setTemplate('branches/people/events/add-source');
    }
}
