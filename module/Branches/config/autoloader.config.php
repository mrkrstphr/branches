<?php

return [
    'Zend\Loader\ClassMapAutoloader' => [
        __DIR__ . '/../config/autoload.classmap.php',
    ],
    'Zend\Loader\StandardAutoloader' => [
        'namespaces' => [
            'Branches' => __DIR__ . '/../src/Branches',
        ],
    ],
];
