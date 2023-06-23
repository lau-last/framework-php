<?php

namespace App\Controller;

use App\Manager\ArticleManager;
use App\Manager\CommentManager;
use App\Manager\UserManager;
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

    public function showAll()
    {
        $comments = (new CommentManager())->getAllComments();
        UserManager::userIsAdmin() ?
            $this->renderer->render('management-comment', \compact('comments')) :
            header('Location: /403');
    }

    public function setValidComment($id)
    {
        (new CommentManager())->updateCommentSetValid($id);
        header('Location: /comment-management');
    }

    public function doDeleteComment($id)
    {
        (new CommentManager())->deleteComment($id);
        header('Location: /comment-management');
    }
}