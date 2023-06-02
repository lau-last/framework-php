<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once dirname(__DIR__).'/vendor/autoload.php';

//$select = new \App\manager\query\Select('article', ['*']);
//dump((new App\manager\Manager())->fetchAll($select));
//die();

(new \App\router\Router())->run(\App\tool\Server::getUri());


