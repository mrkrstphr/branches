<?php

return [
    'doctrine' => [
        'driver' => [
            'branches_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'cache' => 'array',
                'paths' => [
                    realpath(__DIR__ . '/../../src/Branches/Domain/Model'),
                    realpath(__DIR__ . '/../../src/Branches/Persistence/Mapping')
                ],
            ],
            'orm_default' => [
                'drivers' => ['Branches\Domain\Model' => 'branches_driver']
            ]
        ],
    ],
];
