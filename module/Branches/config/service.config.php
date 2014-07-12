<?php

return [
    'factories' => [
        'Branches\Repository\Event\PersonEventTypeRepository' => 'Branches\Persistence\Repository\RepositoryFactory',
        'Branches\Repository\PersonRepository' => 'Branches\Persistence\Repository\RepositoryFactory',
        'Branches\Repository\Person\EventRepository' => 'Branches\Persistence\Repository\RepositoryFactory',
        'Branches\Repository\Place\PlaceRepository' => 'Branches\Persistence\Repository\RepositoryFactory'
    ]
];
