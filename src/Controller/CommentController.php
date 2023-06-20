<?php

namespace App\Controller;

use App\Manager\ArticleManager;
use App\Manager\CommentManager;
use Core\Controller\Controller;
use Core\Http\Request;

final class CommentController extends Controller
{
    public function postComment($articleId)
    {
        $articleId = implode($articleId);
        $request = new Request();
        (new CommentManager())->createComment($request->getPost(), $articleId);
        header('Location: /articles/' . $articleId);
    }
}