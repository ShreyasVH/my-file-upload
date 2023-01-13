<?php
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Micro;

define('APP_PATH', realpath('..') . '/');
date_default_timezone_set('Asia/Kolkata');

include APP_PATH . 'app/config/loader.inc.php';

$di = new FactoryDefault();

include APP_PATH . 'app/config/services.inc.php';

$application = new Micro($di);

include APP_PATH . 'app/config/router.php';

$application->handle($_SERVER["REQUEST_URI"]);