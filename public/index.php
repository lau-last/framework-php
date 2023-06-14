<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../vendor/autoload.php';
require_once '../config/global.php';

$request = new \Core\Http\Request();
(new \Core\Router\Router(require ROOT . '/config/routes.php'))->run($request);
