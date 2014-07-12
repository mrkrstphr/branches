<?php

namespace Branches\Controller;

use Branches\Domain\Entity\Person\Event;
use Branches\Domain\Repository\Person\EventRepositoryInterface;
use Branches\Domain\Repository\PersonRepositoryInterface;
use Branches\Form\People\EventForm;
use Branches\Domain\Repository\Place\PlaceRepositoryInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

/**
 * Class PeopleController
 * @package Branches\Controller
 */
class PeopleController extends AbstractActionController
{
    /**
     * @var EventForm
     */
    protected $eventForm;

    /**
     * @var PersonRepositoryInterface
     */
    protected $personRepository;

    /**
     * @var EventRepositoryInterface
     */
    protected $eventRepositoy;

    /**
     * @var PlaceRepositoryInterface
     */
    protected $placeRepository;

    /**
     * @param EventForm $eventForm
     * @param PersonRepositoryInterface $personRepository
     * @param EventRepositoryInterface $eventRepository
     * @param PlaceRepositoryInterface $placeRepository
     */
    public function __construct(
        EventForm $eventForm,
        PersonRepositoryInterface $personRepository,
        EventRepositoryInterface $eventRepository,
        PlaceRepositoryInterface $placeRepository
    ) {
        $this->eventForm = $eventForm;
        $this->personRepository = $personRepository;
        $this->eventRepositoy = $eventRepository;
        $this->placeRepository = $placeRepository;
    }

    /**
     * @return array
     */
    public function viewAction()
    {
        $id = $this->params()->fromRoute('id');
        $person = $this->personRepository->getById($id);

        return [
            'person' => $person
        ];
    }

    public function reloadEventsAction()
    {
        $id = $this->params()->fromRoute('id');
        $person = $this->personRepository->getById($id);

        $viewModel = new ViewModel(['person' => $person]);
        $viewModel
            ->setTemplate('branches/people/partial/events')
            ->setTerminal(true);

        return $viewModel;
    }

    public function addEventAction()
    {
        $id = $this->params()->fromRoute('id');
        $person = $this->personRepository->getById($id);

        $event = (new Event())->setPerson($person);

        $this->eventForm->bind($event);

        if ($this->getRequest()->isPost()) {
            $this->eventForm->setData($this->request->getPost());
            if ($this->eventForm->isValid()) {
                $this->eventRepositoy
                    ->persist($event)
                    ->persist($event->getPlace())
                    ->flush();

                return new JsonModel(['success' => true]);
            }
        }

        return (new ViewModel([
            'id' => $id,
            'form' => $this->eventForm
        ]))->setTerminal(true);
    }
}
