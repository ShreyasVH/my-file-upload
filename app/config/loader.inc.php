<?php

use Phalcon\Loader;

$loader = new Loader();

$loader->registerDirs
(
    array
    (
        APP_PATH . 'app/controllers/',
    )

)->register();

$loader->registerNamespaces
(
    array
    (
        'app\\controllers' => APP_PATH . 'app/controllers',
        'app\\config' => APP_PATH . 'app/config',
        'Dotenv' => APP_PATH . 'vendor/vlucas/phpdotenv/src',
        'PhpOption' => APP_PATH . 'vendor/phpoption/phpoption/src/PhpOption'
    )

)->register();