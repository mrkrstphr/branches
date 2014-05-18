<?php

return [
    // This should be an array of module namespaces used in the application.
    'modules' => [
        'DoctrineModule',
        'DoctrineORMModule',
        'Branches',
    ],

    'module_listener_options' => [
        'module_paths' => [
            __DIR__ . '/../module',
        ],

        'config_glob_paths' => [
            __DIR__ . '/autoload/{,*.}{global,local}.php',
        ],

        'config_cache_enabled' => (file_exists(__DIR__ . '/cache.config.php')) ? include 'cache.config.php' : false,
        'config_cache_key' => 'config',
        'cache_dir' => realpath(__DIR__ . '/../data/cache'),
    ],
];
