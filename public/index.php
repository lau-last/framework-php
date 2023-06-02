<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once dirname(__DIR__).'/vendor/autoload.php';

$article = (new \App\model\hydrate\Hydrate())->hydrateUser();
dump($article);
die();

(new \App\router\Router(require_once '../src/config/routes.php'))->run(\App\tool\Server::getUri());


