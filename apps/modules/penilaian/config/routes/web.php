<?php

$namespace = "Siakad\Penilaian\Controllers\Web";

$router->addGet("/listkelas",[
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'listKelas'
]);

$router->addGet("/komponenpenilaiankelas", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'komponenpenilaiankelas'
]);

$router->addPost("/komponenpenilaiankelas", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'ubahKomponenPenilaianKelas'
]);

$router->addGet("/lihatnilaikelas", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'lihatnilaikelas'
]);

$router->addPost("/lihatnilaikelas", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'ubahnilaikelas'
]);

$router->addGet("/lihattranskripmahasiswa", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'lihattranskripmahasiswa'
]);

$router->addGet("/lihatskalanilai", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'lihatskalanilai'
]);


