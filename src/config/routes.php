<?php

use App\Controller\ArticleController;
use App\Controller\FormController;
use App\Controller\HomeController;

return [
    new \App\Router\Route('/^\/$/', HomeController::class, 'showHome'),
    new \App\Router\Route('/^\/articles$/', ArticleController::class, 'showAll'),
    new \App\Router\Route('/^\/articles\/([0-9]+)$/', ArticleController::class, 'show'),
    new \App\Router\Route('/^\/articles\/([0-9]+)\/img\/([0-9]+)$/', ArticleController::class, 'showImg'),
    new \App\Router\Route('/^\/form$/', FormController::class, 'show'),
];