<?php

return [
    'doctrine' => [
        'driver' => [
            'orm_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'cache' => 'array',
                'paths' => [
                    realpath(__DIR__ . '/../../src/Domain/Entity'),
                    realpath(__DIR__ . '/../../src/Persistence/Mapping')
                ],
            ],
            'orm_default' => [
                'drivers' => ['Branches\Domain\Entity' => 'orm_driver']
            ]
        ],
    ],
];
