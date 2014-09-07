<?php


return [
    'router' => [
        'routes' => [
            'login' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/login',
                    'defaults' => [
                        'controller' => 'Branches\Controller\Login',
                        'action' => 'login',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'reset-password-start' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/reset-password-start',
                            'defaults' => [
                                'action' => 'reset-password-start'
                            ],
                        ],
                    ],
                    'reset-password' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/reset-password/:resetKey',
                            'defaults' => [
                                'action' => 'reset-password'
                            ],
                        ],
                    ],
                ],
            ],
            'logout' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/logout',
                    'defaults' => [
                        'controller' => 'Branches\Controller\Login',
                        'action' => 'logout',
                    ],
                ],
            ],
            'home' => [
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => 'Branches\Controller\Dashboard',
                        'action'     => 'index',
                    ],
                ],
            ],
            'people' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/people',
                    'defaults' => [
                        'controller' => 'Branches\Controller\People',
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'attributes' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/attributes[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]*',
                            ],
                            'defaults' => [
                                'controller' => 'Branches\Controller\People\Attributes',
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'events' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/events[/:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]*',
                            ],
                            'defaults' => [
                                'controller' => 'Branches\Controller\People\Events',
                                'action' => 'index',
                            ],
                        ],
                    ],
                    'default' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/[:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]*',
                            ],
                        ],
                    ],
                ],
            ],
            'places' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/places',
                    'defaults' => [
                        'controller' => 'Branches\Controller\Places',
                        'action' => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'default' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/[:action[/:id]]',
                            'constraints' => [
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]*',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ],
    ],
    'translator' => [
        'locale' => 'en_US',
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ],
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/file-not-found',
        'exception_template' => 'error/index',
        'strategies' => ['ViewJsonStrategy'],
        'template_map' => [
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/file-not-found' => __DIR__ . '/../view/error/file-not-found.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
