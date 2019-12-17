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

$router->addPost("/ubahkomponenpenilaiankelas", [
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

$router->addPost("/ubahnilaikelas", [
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

$router->addPost("/ubahskalanilai", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'ubahskalanilai'
]);


