<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$request = new \Core\Http\Request($_SERVER, $_GET, $_POST);
(new \Core\Router\Router(require_once '../config/routes.php'))->match($request);