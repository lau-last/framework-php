<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once dirname(__DIR__).'/vendor/autoload.php';

(new \App\Router\Router(require_once '../config/routes.php'))->run($_SERVER['REQUEST_URI']);