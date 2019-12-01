<?php

return array(
    'scheduling' => [
        'namespace' => 'Siakad\Scheduling',
        'webControllerNamespace' => 'Siakad\Scheduling\Controllers\Web',
        'apiControllerNamespace' => 'Siakad\Scheduling\Controllers\Api',
        'className' => 'Siakad\Scheduling\Module',
        'path' => APP_PATH . '/modules/Scheduling/Module.php',
        'defaultRouting' => false,
        'defaultController' => 'scheduling',
        'defaultAction' => 'index'
    ],
    'penilaian' => [
        'namespace' => 'Siakad\Penilaian',
        'webControllerNamespace' => 'Siakad\Penilaian\Controllers\Web',
        'apiControllerNamespace' => 'Siakad\Penilaian\Controllers\Api',
        'className' => 'Siakad\Penilaian\Module',
        'path' => APP_PATH . '/modules/Penilaian/Module.php',
        'defaultRouting' => false,
        'defaultController' => 'Penilaian',
        'defaultAction' => 'index'
    ]

);