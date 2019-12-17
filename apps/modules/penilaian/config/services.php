<?php

use Siakad\Penilaian\Infrastructure\SqlKelasRepository;
use Siakad\Penilaian\Infrastructure\SqlEvaluasiPembelajaranRepository;
use Siakad\Penilaian\Infrastructure\SqlNilaiEvaluasiPembelajaranRepository;
use Siakad\Penilaian\Infrastructure\SqlSemesterRepository;
use Siakad\Penilaian\Infrastructure\SqlSkalaNilaiRepository;

use Phalcon\Mvc\View;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Http\Response;

// $di['voltServiceMail'] = function($view) use ($di) {

//     $config = $di->get('config');

//     $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
//     if (!is_dir($config->mail->cacheDir)) {
//         mkdir($config->mail->cacheDir);
//     }

//     $compileAlways = $config->mode == 'DEVELOPMENT' ? true : false;

//     $volt->setOptions(array(
//         "compiledPath" => $config->mail->cacheDir,
//         "compiledExtension" => ".compiled",
//         "compileAlways" => $compileAlways
//     ));
//     return $volt;
// };

$di['view'] = function () {
    $view = new View();
    $view->setViewsDir(__DIR__ . '/../views/');

    $view->registerEngines(
        [
            ".volt" => "voltService",
        ]
    );

    return $view;
};

$di->setShared('sql_kelas_repository', function() use ($di) {
    $repo = new SqlKelasRepository($di);
    return $repo;
});

$di->setShared('sql_evaluasi_pembelajaran_repository', function() use ($di) {
    $repo = new SqlEvaluasiPembelajaranRepository($di);
    return $repo;
});

$di->setShared('sql_nilai_evaluasi_pembelajaran_repository', function() use ($di) {
    $repo = new SqlNilaiEvaluasiPembelajaranRepository($di);
    return $repo;
});

$di->setShared('sql_semester_repository', function() use ($di) {
    $repo = new SqlSemesterRepository($di);
    return $repo;
});

$di->setShared('sql_nilai_repository', function() use ($di) {
    $repo = new SqlSkalaNilaiRepository($di);
    return $repo;
});

$di->set(
    'flash',
    function () {
        return new FlashSession();
    }
);

$di->set(
    'response',
    function () {
        return new Response();
    }
);