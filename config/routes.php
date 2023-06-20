<?php

return [
    new \Core\Router\Route('/^\/$/', \App\Controller\HomeController::class, 'showHome'),
    new \Core\Router\Route('/^\/articles$/', \App\Controller\ArticleController::class, 'showAll'),
    new \Core\Router\Route('/^\/articles\/([0-9]+)$/', \App\Controller\ArticleController::class, 'show'),
    new \Core\Router\Route('/^\/post-comment\/([0-9]+)$/', \App\Controller\CommentController::class, 'postComment'),
    new \Core\Router\Route('/^\/registration$/', \App\Controller\FormController::class, 'showFormRegistration'),
    new \Core\Router\Route('/^\/do-registration$/', \App\Controller\FormController::class, 'doRegistration'),
    new \Core\Router\Route('/^\/connection$/', \App\Controller\FormController::class, 'showFormConnection'),
    new \Core\Router\Route('/^\/do-connection$/', \App\Controller\FormController::class, 'doConnection'),
    new \Core\Router\Route('/^\/logout$/', \App\Controller\FormController::class, 'logout'),
    new \Core\Router\Route('/^\/article-creation/', \App\Controller\FormController::class, 'showFormCreationArticle'),
    new \Core\Router\Route('/^\/do-article-creation/', \App\Controller\ArticleController::class, 'postArticle'),
];
