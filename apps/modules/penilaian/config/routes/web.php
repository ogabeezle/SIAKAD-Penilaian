<?php

$namespace = "Siakad\Penilaian\Controllers\Web";

$router->addGet("/nilai",[
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action'
]);