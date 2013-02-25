<?php
return array(
    'modules' => array(
        'Application', 'Branches'
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            'config/autoload/{,*.}{global,local}.php',
            '../../../config/{,*.}.php'
        ),
        'module_paths' => array(
            './module',
            './vendor',
        ),
    ),
);
