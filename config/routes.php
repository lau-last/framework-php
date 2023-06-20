<?php

return [
    new \Core\Router\Route('/^\/$/', \App\Controller\HomeController::class, 'showHome'),
    new \Core\Router\Route('/^\/articles$/', \App\Controller\ArticleController::class, 'showAll'),
    new \Core\Router\Route('/^\/articles\/([0-9]+)$/', \App\Controller\ArticleController::class, 'show'),
    new \Core\Router\Route('/^\/post-comment\/([0-9]+)$/', \App\Controller\CommentController::class, 'postComment'),
    new \Core\Router\Route('/^\/registration$/', \App\Controller\RegistrationController::class, 'showFormRegistration'),
    new \Core\Router\Route('/^\/do-registration$/', \App\Controller\RegistrationController::class, 'doRegistration'),
    new \Core\Router\Route('/^\/connection$/', \App\Controller\ConnectionController::class, 'showFormConnection'),
    new \Core\Router\Route('/^\/do-connection$/', \App\Controller\ConnectionController::class, 'doConnection'),
];
