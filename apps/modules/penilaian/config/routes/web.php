<?php

$namespace = "Siakad\Penilaian\Controllers\Web";

$isMikel = false;
if($isMikel){
    $prefix = "/penilaian";
} else {
    $prefix = "";
}

$router->addGet($prefix."/listkelas",[
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'listKelas'
]);

$router->addGet($prefix."/komponenpenilaiankelas", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'komponenpenilaiankelas'
]);

$router->addPost($prefix."/komponenpenilaiankelas", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'ubahKomponenPenilaianKelas'
]);

$router->addGet($prefix."/lihatnilaikelas", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'lihatnilaikelas'
]);

$router->addPost($prefix."/lihatnilaikelas", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'ubahnilaikelas'
]);

$router->addGet($prefix."/lihattranskripmahasiswa", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => 'lihattranskripmahasiswa'
]);

$router->addPost("$prefix/???", [
    'namespace' => $namespace,
    'module' => 'penilaian',
    'controller' => 'penilaian',
    'action' => '???'
]);

