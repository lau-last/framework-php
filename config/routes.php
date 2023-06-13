<?php

return [
    new \Core\Router\Route('/article/([0-9]+)/img/([0-9]+)', \App\Controller\HomeController::class, 'showHome'),
//    new \App\Router\Route('/^\/articles$/', \App\Core\Controller\ArticleController::class, 'showAll'),
//    new \App\Router\Route('/^\/articles\/([0-9]+)$/', \App\Core\Controller\ArticleController::class, 'show'),
//    new \App\Router\Route('/^\/articles\/([0-9]+)\/img\/([0-9]+)$/', \App\Core\Controller\ArticleController::class, 'showImg'),
//    new \App\Router\Route('/^\/form$/', \App\Core\Controller\FormController::class, 'show'),
];