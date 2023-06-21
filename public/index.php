<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';
require_once '../config/global.php';

(new \Core\Session\Session())->start();

$request = new \Core\Http\Request();
(new \Core\Router\Router(require ROOT . '/config/routes.php'))->run($request);

dump($_SESSION);


