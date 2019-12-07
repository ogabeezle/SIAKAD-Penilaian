<?php

$namespace = "Siakad\Penilaian\Controllers\Web";

$router->addGet("/listkelas",[
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'listkelas'
]);

$router->addGet("/komponenpenilaiankelas", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'komponenpenilaiankelas'
]);

$router->addGet("/lihatnilaikelas", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'lihatnilaikelas'
]);

$router->addGet("/lihattranskripmahasiswa", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'lihattranskripmahasiswa'
]);

$router->addPost("/???", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => '???'
]);

$router->addPost("/???", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => '???'
]);