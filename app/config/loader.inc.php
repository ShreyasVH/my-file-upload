<?php

use Phalcon\Autoload\Loader;

$loader = new Loader();

$loader->setDirectories
(
    array
    (
        APP_PATH . 'app/controllers/',
    )

)->register();

$loader->setNamespaces
(
    array
    (
        'app\\controllers' => APP_PATH . 'app/controllers',
        'app\\config' => APP_PATH . 'app/config',
        'Dotenv' => APP_PATH . 'vendor/vlucas/phpdotenv/src',
        'PhpOption' => APP_PATH . 'vendor/phpoption/phpoption/src/PhpOption',
        'GrahamCampbell\\ResultType' => APP_PATH . 'vendor/graham-campbell/result-type/src'
    )

)->register();