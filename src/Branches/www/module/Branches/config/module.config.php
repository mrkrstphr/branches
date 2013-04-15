<?php

return [
    'router' => [
        'routes' => [
            'people' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route'    => '/people[/[:page]]',
                    'constraints' => [
                        'page' => '[0-9]+'
                    ],
                    'defaults' => [
                        'controller'    => 'Branches\Controller\People',
                        'action'        => 'index',
                        'page'          => 1
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'viewPeople' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route' => 'view/[:id]',
                            'constraints' => [
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'action' => 'view'
                            ]
                        ]
                    ]
                ]
            ],
            'places' => [
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => [
                    'route'    => '/places',
                    'defaults' => [
                        'controller' => 'Branches\Controller\Places',
                        'action' => 'index',
                        'page' => 1
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'paginate' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/[:page]',
                            'constraints' => [
                                'page' => '[0-9]+'
                            ],
                            'defaults' => [
                                'page' => 1
                            ]
                        ]
                    ],
                    'view-place' => [
                        'type'    => 'Segment',
                        'options' => [
                            'route' => '/view/[:id]',
                            'constraints' => [
                                'id' => '[0-9]+'
                            ],
                            'defaults' => [
                                'action' => 'view'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    'controllers' => [
        'invokables' => [],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'navigation' => [
        'default' => [
            [
                'label' => 'People',
                'route' => 'people',
                'pages' => [
                    [
                        'route' => 'people/viewPeople'
                    ]
                ]
            ],
            [
                'label' => 'Places',
                'route' => 'places',
                'pages' => [
                    [
                        'route' => 'places/view-place'
                    ]
                ]
            ],
            [
                'label' => 'Media',
                'uri' => '/media',
            ],
            [
                'label' => 'Sources',
                'uri' => '/sources',
            ]
        ],
    ],
];
