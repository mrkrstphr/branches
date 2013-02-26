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
                    'route'    => '/people[/]',
                    'defaults' => array(
                        'controller' => 'Branches\Controller\People',
                        'action'     => 'index',
                    ),
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
                                'action'     => 'view',
                            ),
                        ),
                    )
                )
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
