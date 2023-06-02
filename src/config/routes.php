<?php

return [
    new \App\router\Route('/^\/$/', App\controller\HomeController::class, 'showHome'),
    new \App\router\Route('/^\/articles$/', App\controller\ArticleController::class, 'showAll'),
    new \App\router\Route('/^\/articles\/([0-9]+)$/', App\controller\ArticleController::class, 'show'),
    new \App\router\Route('/^\/articles\/([0-9]+)\/img\/([0-9]+)$/', App\controller\ArticleController::class, 'showImg'),
    new \App\router\Route('/^\/form$/', App\controller\FormController::class, 'show'),
];