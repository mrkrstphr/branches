<?php

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => 'Branches\Controller\Index',
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'view_manager' => [
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => include __DIR__ . '/template.map.php',
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
