<?php

return [
    new \Core\Router\Route('/^\/$/', \App\Controller\HomeController::class, 'showHome'),
    new \Core\Router\Route('/^\/articles$/', \App\Controller\ArticleController::class, 'showAll'),
];


//    new \App\Router\Route('/^\/articles\/([0-9]+)$/', \App\Controller\ArticleController::class, 'show'),
//    new \App\Router\Route('/^\/articles\/([0-9]+)\/img\/([0-9]+)$/', \App\Controller\ArticleController::class, 'showImg'),
//    new \App\Router\Route('/^\/form$/', \App\Controller\FormController::class, 'show'),