<?php

namespace App\Controller;

use App\Manager\CommentManager;
use App\Manager\ArticleManager;
use Core\Controller\Controller;

final class ArticleController extends Controller
{

    public function showAll()
    {
        $articles = (new ArticleManager())->getArticles();
        $this->renderer->render('showAll', \compact('articles'));
    }

    public function show($id)
    {
        $article = (new ArticleManager())->getArticle($id);
        $comments = (new CommentManager())->getCommentFromArticle($id);
        $this->renderer->render('show', \compact('article', 'comments'));
    }
}