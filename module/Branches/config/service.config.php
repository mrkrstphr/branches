<?php

return [
    'factories' => [
        'Branches\Repository\Event\PersonEventTypeRepository' => 'Branches\Persistence\Repository\RepositoryFactory',
        'Branches\Repository\PersonRepository' => 'Branches\Persistence\Repository\RepositoryFactory',
        'Branches\Repository\Person\AttributeTypeRepository' => 'Branches\Persistence\Repository\RepositoryFactory',
        'Branches\Repository\Person\EventRepository' => 'Branches\Persistence\Repository\RepositoryFactory',
        'Branches\Repository\Person\EventSourceRepository' => 'Branches\Persistence\Repository\RepositoryFactory',
        'Branches\Repository\Place\PlaceRepository' => 'Branches\Persistence\Repository\RepositoryFactory',
        'Branches\Repository\Source\SourceRepository' => 'Branches\Persistence\Repository\RepositoryFactory',
        'Branches\Service\Json\Serializer' => 'Branches\Service\ServiceFactory',
        'Branches\Fieldset\SourceSelection' => function ($sm) {
            return new \Branches\Form\Source\SourceSelectionFieldset(
                $sm->get('Branches\Repository\Source\SourceRepository'),
                'source'
            );
        },
        'Branches\Form\SourceCitation' => function ($sm) {
            $fieldset = (new \Branches\Form\People\Event\SourceCitationFieldset(
                $sm->get('Branches\Fieldset\SourceSelection')
            ))
                ->setHydrator(new \DoctrineModule\Stdlib\Hydrator\DoctrineObject($sm->get('Doctrine\ORM\EntityManager')))
                ->setObject(new \Branches\Domain\Entity\Person\EventSource());
            return new \Branches\Form\People\Event\SourceCitationForm($fieldset);
        }
    ]
];
