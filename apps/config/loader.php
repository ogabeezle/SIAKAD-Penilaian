<?php

$loader = new \Phalcon\Loader();

/**
  * Load library namespace
  */
$loader->registerNamespaces(array(
	/**
	 * Load SQL server db adapter namespace
	 */
	'Phalcon\Db\Adapter\Pdo' => APP_PATH . '/lib/Phalcon/Db/Adapter/Pdo',
	'Phalcon\Db\Dialect' => APP_PATH . '/lib/Phalcon/Db/Dialect',
	'Phalcon\Db\Result' => APP_PATH . '/lib/Phalcon/Db/Result',


    /**
     * Load common classes
     */
    'Siakad\Common\Exception' => APP_PATH . '/common/exception',

));

$loader->register();
