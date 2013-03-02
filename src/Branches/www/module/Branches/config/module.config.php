<?php
/**
 *
 */

return array(
    'router' => array(
        'routes' => array(
            'people' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/people[/[:page]]',
                    'constraints' => array(
                        'page' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller'    => 'Branches\Controller\People',
                        'action'        => 'index',
                        'page'          => 1
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'viewPeople' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route' => 'view/[:id]',
                            'constraints' => array(
                                'id' => '[0-9]+'
                            ),
                            'defaults' => array(
                                'action' => 'view'
                            )
                        )
                    )
                )
            ),
            'places' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/places[/[:page]]',
                    'constraints' => array(
                        'page' => '[0-9]+'
                    ),
                    'defaults' => array(
                        'controller'    => 'Branches\Controller\Places',
                        'action'        => 'index',
                        'page'          => 1
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'viewPlace' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route' => 'view/[:id]',
                            'constraints' => array(
                                'id' => '[0-9]+'
                            ),
                            'defaults' => array(
                                'action' => 'view'
                            )
                        )
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'People',
                'route' => 'people',
                'pages' => array(
                    array(
                        'route' => 'people/viewPeople'
                    )
                )
            ),
            array(
                'label' => 'Places',
                'uri' => '/places',
            ),
            array(
                'label' => 'Media',
                'uri' => '/media',
            ),
            array(
                'label' => 'Sources',
                'uri' => '/sources',
            )
        ),
    ),
);
