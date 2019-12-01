<?php

namespace Siakad\Scheduling;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Siakad\Penilaian\Domain\Model' => __DIR__ . '/domain/model',
            'Siakad\Penilaian\Infrastructure' => __DIR__ . '/infrastructure',
            'Siakad\Penilaian\Application' => __DIR__ . '/application',
            'Siakad\Penilaian\Controllers\Web' => __DIR__ . '/controllers/web',
            'Siakad\Penilaian\Controllers\Api' => __DIR__ . '/controllers/api',
            'Siakad\Penilaian\Controllers\Validators' => __DIR__ . '/controllers/validators',
        ]);
    }

    public function registerServices(DiInterface $di = null)
    {
        $moduleConfig = require __DIR__ . '/config/config.php';

        $di->get('config')->merge($moduleConfig);

        include_once  __DIR__ . '/config/services.php';
    }
}