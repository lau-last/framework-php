<?php

return [
    new \Core\Router\Route('/^\/$/', \App\Controller\HomeController::class, 'showHome'),
    new \Core\Router\Route('/^\/articles$/', \App\Controller\ArticleController::class, 'showAll'),
    new \Core\Router\Route('/^\/articles\/([0-9]+)$/', \App\Controller\ArticleController::class, 'show'),
    new \Core\Router\Route('/^\/registration$/', \App\Controller\LogController::class, 'showRegistration'),
    new \Core\Router\Route('/^\/connection$/', \App\Controller\LogController::class, 'showConnection'),
];
